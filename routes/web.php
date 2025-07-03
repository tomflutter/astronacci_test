<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback']);
Route::get('/choose-membership', [SocialAuthController::class, 'showMembershipForm'])->name('membership.choose');
Route::post('/choose-membership', [SocialAuthController::class, 'storeMembership'])->name('membership.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/artikel/{id}', [ContentController::class, 'showArtikel'])
        ->middleware(['auth', 'membership:article']);
});
Route::middleware(['auth', 'check.membership:article'])->get('/artikel/{id}', [ContentController::class, 'showArtikel']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/artikel/{id}', [ContentController::class, 'showArtikel'])
        ->middleware(['auth', 'membership:article']);


    // ✅ Ini benar
    Route::get('/video/{id}', [ContentController::class, 'showVideo'])
        ->middleware(['auth', 'membership:video']);
});


require __DIR__ . '/auth.php';
