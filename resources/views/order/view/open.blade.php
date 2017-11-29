@extends('layouts.master')

@section('title', 'Open Orders')

@section('content')
    <p>Below is a list of open orders. Marking them as completed will automatically notify the user. Any orders older than {{ config('app.order_max_life') }} hour{{ config('app.order_max_life') != 1 ? 's' : '' }} will be considered abandoned and automatically purged from the system.

    <div class="orders">
        <div class="card-deck">
            @each('order.view.item', $objOrders, 'objOrder', 'order.view.empty')
        </div>
    </div>
@endsection
