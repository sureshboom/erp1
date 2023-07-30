<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (auth('user')->check() && auth('user')->user()->role == 'account') {
            return redirect()->route('account.dashboard');
        }
        elseif (auth('user')->check() && auth('user')->user()->role == 'telecaller')
        {
            return redirect()->route('telecaller.dashboard');
        }
        elseif (auth('user')->check() && auth('user')->user()->role == 'supervisor')
        {
            return redirect()->route('supervisor.dashboard');
        }
        elseif (auth('user')->check() && auth('user')->user()->role == 'engineer')
        {
            return redirect()->route('engineer.dashboard');
        }

        return redirect('login');
        
    }
}
