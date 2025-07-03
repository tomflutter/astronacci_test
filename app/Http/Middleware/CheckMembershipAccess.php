<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckMembershipAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $contentType)
    {
        $user = Auth::user();

        $limit = match ($user->membership_type) {
            'A' => 3,
            'B' => 10,
            'C' => INF, // Unlimited
            default => 0,
        };

        $used = $user->access_logs()
            ->where('type', $contentType)
            ->count();

        if (is_numeric($limit) && $used >= $limit) {
            return redirect()->route('dashboard')->with(
                'error',
                'Akses ' . ($contentType === 'article' ? 'artikel' : 'video') . ' kamu telah mencapai batas.'
            );
        }

        // Log akses
        $user->access_logs()->create([
            'type' => $contentType,
            'accessed_at' => now(),
        ]);

        return $next($request);
    }
}
