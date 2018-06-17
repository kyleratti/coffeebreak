@extends('layouts.master')

@section('title', 'Order Placed')

@section('content')
    <div class="card bg-success text-center" style="width: 30rem;">
        <div class="card-body text-white">
            <h4 class="card-title">Order Placed!</h4>

            <p class="card-text">Your {{ strtolower($objOrder->drink->name) }} order has been placed. You'll receive an e-mail when it's ready.</p>
        </div>

        <ul class="list-group list-group-flush bg-success">
            <li class="list-group-item bg-light"><b>{{ $objOrder->drink->name }}</b></li>

            @if($objOrder->iced)
                <li class="list-group-item bg-light">Iced</li>
            @endif
            <li class="list-group-item bg-light">{{ $objOrder->shots }} espresso shot{{ $objOrder->shots != 1 ? 's' : '' }}</li>
            <li class="list-group-item bg-light">{{ $objOrder->milk->name }}</li>
        </ul>
    </div>
@endsection
