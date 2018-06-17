<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Show the user login page
     * 
     * @return View
     */
    public function showLogin()
    {
        if(Auth::check())
        {
            return redirect()->route('home');
        }

        return view('user/login');
    }

    /**
     * Show the user logout page
     * 
     * @return View
     */
    public function showLogout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
