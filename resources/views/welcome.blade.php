@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1 class="display-1">Welcome</h1>

    <p>I understand you have a lot of choices in ordering espresso-based beverages at work today, so I just wanted to take a moment and thank you for choosing CoffeeBreak. It means a lot. This is a small web page thrown together <small>very</small> quickly that tries to provide centralized espresso beverage ordering and at-desk notifications.</p>

    @if(!Auth::check())
        <p class="alert alert-info">In order to access the menu and place your order, please click <a class="alert-link" href="{{ route('user.login') }}">Log in</a> on the header above.</p>
    @endif

    <p><i>* I make absolutely no claims to the reliability of this website. If it messes up and you don't get your coffee, well, that sucks. Forward your complaints to <a href="mailto:noreply@westminsteramerican.com">noreply@westminsteramerican.com</a></i>.</p>
@endsection
