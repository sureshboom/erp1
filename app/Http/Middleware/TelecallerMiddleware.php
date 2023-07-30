<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TelecallerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()){
            if (auth('user')->user()->role == 'account') {
                return redirect()->route('account.dashboard');
            }

            if (auth('user')->user()->role == 'telecaller') {
                
                return $next($request);
            }

            if (auth('user')->user()->role == 'chiefengineer') {
                return redirect()->route('chiefengineer.dashboard');
            }
            if (auth('user')->user()->role == 'siteengineer') {
                return redirect()->route('siteengineer.dashboard');
            }
            if (auth('user')->user()->role == 'salesmanager') {
                return redirect()->route('salesmanager.dashboard');
            }
            if (auth('user')->user()->role == 'salesperson') {
                return redirect()->route('salesperson.dashboard');
            }
        }

        return redirect()->route('login');
    }
}
