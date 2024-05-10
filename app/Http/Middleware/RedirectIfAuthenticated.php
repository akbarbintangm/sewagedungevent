<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::check() && Auth::user()->type_user == 'ADMINISTRATOR') {
                return redirect()
                    ->route('dashboardPage:admin')
                    ->with('info', 'Anda Sudah Login ataupun Terdaftar! '.Auth::user()->name);
            } else if (Auth::check() && Auth::user()->type_user == 'PEMILIK_GEDUNG') {
                return redirect()
                    ->route('dashboardPage:owner')
                    ->with('info', 'Anda Sudah Login ataupun Terdaftar! '.Auth::user()->name);
            } else if (Auth::check() && Auth::user()->type_user == 'CUSTOMER' ) {
                return redirect()
                    ->route('homePage:user')
                    ->with('info', 'Anda Sudah Login ataupun Terdaftar! '.Auth::user()->name);
            } else if (Auth::check() && Auth::user()->type_user == 'ENTRY') {
                return redirect()
                    ->route('dashboardPage:entry')
                    ->with('info', 'Anda Sudah Login ataupun Terdaftar! '.Auth::user()->name);
            }
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }
        }
        return $next($request);
    }
}
