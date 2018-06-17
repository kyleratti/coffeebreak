@extends('layouts.master')

@section('title', 'Menu')

@section('content')
    @if(!Setting::get('accepting_orders', false))
        <p>You can browse the menu below, but you won't be able to place an order.</p>
    @else
        <p>Please browse our vast selection of drinks below. When you're ready, just click the <b>Place Order</b> button.</p>
    @endif

    <div class="drinks">
        @foreach($objDrinks as $objDrink)
            @if($loop->index % 3 == 0)
                <div class="card-deck card-row">
            @endif

            @include('menu.item', ['objDrink' => $objDrink])

            @if(($loop->index + 1) % 3 == 0)
                </div>
            @endif
        @endforeach
    </div>
@endsection
