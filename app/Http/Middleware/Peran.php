<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Peran
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $peran
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $peran)
    {
        if (Auth::check()) {
            $peran = explode('-', $peran);

            foreach ($peran as $group) {
                if (Auth::user()->role == $group) {
                    return $next($request);
                }
            }
        }
        return redirect('/');
    }
}
