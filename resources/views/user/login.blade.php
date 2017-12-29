@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <p>In an effort to simplify the number of logins you have, this website doesn't require you to create a new account.</p>
    
    <p>Instead, you'll be sent over to Microsoft's website to sign in with your Office 365 e-mail account, and then automatically sent back here once you're signed in.</p>

    <div class="graph-signin">
        <a href="{{ route('user.login.go') }}"><img src="https://docs.microsoft.com/en-us/azure/active-directory/develop/media/active-directory-branding-guidelines/sign-in-with-microsoft-light.png" alt="Sign in with Microsoft"/></a>
    </div>
@endsection
