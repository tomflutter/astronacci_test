<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        $user = User::where('email', $socialUser->getEmail())->first();

        if ($user) {
            Auth::login($user);

            if (in_array($user->membership_type, ['A', 'B', 'C'])) {
                return redirect('/dashboard');
            }

            return redirect()->route('membership.choose');
        }

        // JANGAN LANGSUNG BUAT USER DI SINI

        // Simpan dulu info user ke session
        Session::put('social_user', [
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
        ]);

        return redirect()->route('membership.choose');
    }


    public function showMembershipForm()
    {
        if (!Session::has('social_user')) {
            return redirect('/login')->with('error', 'Sesi login sosial tidak ditemukan.');
        }

        return view('auth.choose-membership');
    }

    public function storeMembership(Request $request)
    {
        $request->validate([
            'membership_type' => 'required|in:A,B,C',
        ]);

        $data = Session::get('social_user');

        if (!$data) {
            return redirect('/login')->with('error', 'Sesi sosial tidak ditemukan.');
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt(Str::random(16)),
            'membership_type' => $request->membership_type,
        ]);

        Session::forget('social_user');

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Membership berhasil dipilih!');
    }
}
