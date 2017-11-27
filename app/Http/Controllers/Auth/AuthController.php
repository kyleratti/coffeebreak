<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Socialize;
use App\User\User;

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
        try
        {
            $objUser = Socialize::with('graph')->user();
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());

            return 'Error signing in.';
        }

        $strDisplayName = $objUser->displayName;
        $strGivenName = $objUser->givenName;
        $strSurname = $objUser->surname;
        $strMail = $objUser->mail;
        $strJobTitle = $objUser->jobTitle;

        $objAuthedUser = $this->findOrCreateUser($objUser);
        Auth::login($objAuthedUser, true);

        return redirect()->route('home');
    }

    /**
     * Update the session token
     * 
     * @param $objUser
     * @param $objAuthedUser
     * @return void
     */
    private function updateToken($objAuthedUser, $objUser)
    {
        $objAuthedUser->token = $objUser->token;
        $objAuthedUser->save();
    }

    /**
     * Return user if exists, create and return if it doesn't
     * 
     * @param $objUSer
     * @return User
     */
    private function findOrCreateUser($objUser)
    {
        $objAuthedUser = User::where('microsoft_id', $objUser->id)->first();

        if($objAuthedUser)
        {
            $this->updateToken($objAuthedUser, $objUser);
            return $objAuthedUser;
        }

        var_dump($objUser->jobTitle);

        return User::create([
            'microsoft_id' => $objUser->id,
            'token' => $objUser->token,
            'display_name' => $objUser->displayName,
            'given_name' => $objUser->givenName,
            'surname' => $objUser->surname,
            'email' => $objUser->mail,
            'job_title' => $objUser->jobTitle,
        ]);
    }
}
