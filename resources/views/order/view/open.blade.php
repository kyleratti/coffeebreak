@extends('layouts.master')

@section('title', 'Open Orders')

@section('content')
    @include('admin.settings.acceptingorders')

    <p>Below is a list of open orders. Marking them as completed will automatically notify the user via e-mail.

    <div class="orders">
        <div class="card-deck">
            @each('order.view.item', $objOrders, 'objOrder', 'order.view.empty')
        </div>
    </div>
@endsection
