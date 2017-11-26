@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <p>You'll need to sign into CoffeeBreak in order to place an order. You can sign in using your Office 365 credentials.</p>

    <div class="graph-signin">
        <a href="{{ route('user.login.go') }}"><img src="https://docs.microsoft.com/en-us/azure/active-directory/develop/media/active-directory-branding-guidelines/sign-in-with-microsoft-light.png" alt="Sign in with Microsoft"/></a>
    </div>
@endsection
