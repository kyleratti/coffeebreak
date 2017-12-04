@extends('layouts.master')

@section('title', 'Menu')

@section('content')
    @if(!Setting::get('accepting_orders', false))
        <div class="alert alert-danger">
            <b>New orders are currently not being accepted!</b>
        </div>

        <p>You can browse our menu below, but you won't be able to place an order.</p>
    @else
        <p>Please browse our vast selection of drinks below. When you're ready, just click the <b>Place Order</b> button.</p>
    @endif

    <div class="drinks">
        <div class="card-deck">
            @each('menu.item', $objDrinks, 'objDrink', 'menu.empty')
        </div>
    </div>
@endsection
