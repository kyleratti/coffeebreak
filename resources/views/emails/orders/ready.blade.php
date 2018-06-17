@extends('emails.template')

@section('title', 'Your coffee is ready!')

@php
    $arrTitles = array("It's done!", "You're up!", "It's ready!", "Hurry!", "Come and get it!");
@endphp

@section('content')
    <h1>{{ $arrTitles[array_rand($arrTitles)] }}</h1>

    <p>Hey, {{ $objDrinkOrder->user->given_name }}, your {{ $objDrinkOrder->iced ? 'Iced ' : '' }} {{ strtolower($objDrinkOrder->drink->name) }} is ready! Come pick it up when you have a second.</p>
@endsection
