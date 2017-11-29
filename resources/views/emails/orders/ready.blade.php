@extends('emails.template')

@section('title', 'Your coffee is ready!')

@section('content')
    <h1>It's done!</h1>

    <p>Hey, {{ $objDrinkOrder->user->given_name }}, your {{ strtolower($objDrinkOrder->drink->name) }} is ready! Come pick it up when you have a second.</p>
@endsection
