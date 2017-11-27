@extends('layouts.master')

@section('title', 'Menu')

@section('content')
    <p>Please browse our vast selection of drinks below. When you're ready, just click the <b>Place Order</b> button.</p>

    <div class="drinks">
        @each('menu.item', $objDrinks, 'objDrink', 'menu.empty')
    </div>
@endsection