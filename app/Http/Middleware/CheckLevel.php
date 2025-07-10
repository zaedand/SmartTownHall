<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$levels
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        $user = Auth::user();

        if (!$user || !in_array($user->level, $levels)) {
            // Redirect to home if user does not have the correct level
            return redirect()->route('login')->with('ditolak', '🚫Maaf anda tidak memiliki akses.',);
        }

        return $next($request);
    }
}
