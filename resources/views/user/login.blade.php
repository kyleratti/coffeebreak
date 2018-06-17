@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <h1 class="display-1">Log in</h1>

    <p><b>CoffeeBreak</b> uses your work Office 365 account to sign in.</p>

    <p>You'll be sent to Microsoft for your credentials and returned here when you're finished.</p>

    <div class="graph-signin">
        <a href="{{ route('user.login.go') }}"><img src="https://docs.microsoft.com/en-us/azure/active-directory/develop/media/active-directory-branding-guidelines/sign-in-with-microsoft-light.png" alt="Sign in with Microsoft"/></a>
    </div>
@endsection
