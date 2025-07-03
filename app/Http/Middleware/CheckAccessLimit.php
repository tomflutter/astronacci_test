<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccessLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    $user = auth()->user();

    $maxArticles = match ($user->membership_type) {
        'A' => 3,
        'B' => 10,
        default => PHP_INT_MAX,
    };

    $maxVideos = $maxArticles;

    view()->share([
        'maxArticles' => $maxArticles,
        'maxVideos' => $maxVideos,
    ]);

    return $next($request);
}

}
