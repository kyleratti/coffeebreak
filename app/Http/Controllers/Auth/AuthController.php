<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialize;

class AuthController extends Controller
{
    /**
     * Instantiate a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Redirect the user to the Graph authentication page
     * 
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialize::with('graph')->redirect();
    }

    /**
     * Obtain the user information from graph
     * 
     * @return Response
     */
    public function handleProviderCallback(Request $objRequest)
    {
        $objUser = Socialize::with('graph')->user();

        var_dump($objUser);
        die();
    }
}
