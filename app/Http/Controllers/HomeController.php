<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        if (auth('user')->check() && auth('user')->user()->role == 'account') {
            return redirect()->route('account.dashboard');
        } elseif (auth('user')->check() && auth('user')->user()->role == 'telecaller') {
            
            return redirect()->route('telecaller.dashboard');
        } elseif (auth('user')->check() && auth('user')->user()->role == 'siteengineer') {
            
            return redirect()->route('siteengineer.dashboard');
        }
        elseif (auth('user')->check() && auth('user')->user()->role == 'chiefengineer') {
            
            return redirect()->route('chiefengineer.dashboard');
        }
        elseif (auth('user')->check() && auth('user')->user()->role == 'salesmanager') {
            
            return redirect()->route('salesmanager.dashboard');
        }
        elseif (auth('user')->check() && auth('user')->user()->role == 'salesperson') {
            
            return redirect()->route('salesperson.dashboard');
        }

        return redirect('login');
    }
}
