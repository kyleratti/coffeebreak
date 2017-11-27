@extends('emails.template')

@section('title', 'Coffee Order placed!')

@section('content')
    <h1>Coffee Order Placed!</h1>

    <p>We're just writing to remind you that your coffee order has been placed and should be ready soon.</p>

    <p>We'll send you another e-mail when it's finished.</p>

    {{ die(var_dump($objDrinkOrder)) }}

    <p><b>{{ $objDrinkOrder->drink->name }}</b></p>
    <p>{{ $objDrinkOrder->shots }} espresso shot{{ $objDrinkOrder->shots != 1 ? 's' : '' }}</p>
    <p>{{ $objDrinkOrder->drink->getMilkType() }}</p>
@endsection
