<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the user login page
     * 
     * @return View
     */
    public function showLogin()
    {
        return view('user/login');
    }
}
