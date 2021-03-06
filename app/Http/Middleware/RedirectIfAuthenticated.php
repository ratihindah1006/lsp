<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/dashboard');
        } else if (Auth::guard('assessi')->check()) {
            return redirect('/beranda');
        } else if (Auth::guard('assessor')->check()) {
            return redirect('/assessor');
        }
    
        return $next($request);
    }
}
