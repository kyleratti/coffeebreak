@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1 class="display-1">Welcome</h1>

    <p>I understand you have a lot of choices in ordering espresso-based beverages at work today, so I just wanted to take a moment and thank you for choosing CoffeeBreak. It means a lot.</p>

    @if(!Auth::check())
        <p class="alert alert-info">In order to access the menu and place your order, please <a class="alert-link" href="{{ route('user.login') }}">Log in</a>.</p>
    @endif

    <p><i>I make absolutely no claims to the reliability of this website. If it messes up and you don't get your coffee, well, that sucks. Forward your complaints to <a href="mailto:noreply@westminsteramerican.com">noreply@westminsteramerican.com</a></i>.</p>

    @if($iNumOrders > 10)
        <p>This app has proudly helped serve <b>{{ $iNumOrders }}</b> drink orders to date.</p>
    @endif

    @if(Auth::check())
        @if(Auth::user()->email === "lwetzel@westminsteramerican.com" || Auth::user()->email === "aqueen@westminsteramerican.com")
            <p><i>p.s. <b>{{ Auth::user()->given_name }}</b>, please don't order 18 coffees again :(</i></p>
        @endif
    @endif
@endsection
