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
        return view('user/login', [
            'objUser' => Auth::user(),
        ]);
    }
}
