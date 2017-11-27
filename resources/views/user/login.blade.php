@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <p>In order to provide accurate and reliable service, you'll need to sign into your Office 365 account to continue. Go ahead, click it!</p>

    <div class="graph-signin">
        <a href="{{ route('user.login.go') }}"><img src="https://docs.microsoft.com/en-us/azure/active-directory/develop/media/active-directory-branding-guidelines/sign-in-with-microsoft-light.png" alt="Sign in with Microsoft"/></a>
    </div>
@endsection
