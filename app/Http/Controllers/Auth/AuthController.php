<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
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
    }
}
