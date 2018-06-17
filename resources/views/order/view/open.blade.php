@extends('layouts.master')

@section('title', 'Open Orders')

@section('content')
    @include('admin.settings.acceptingorders')

    <p>Below is a list of open orders. Marking them as completed will automatically notify the user via e-mail.

    <div class="orders">
        @foreach($objOrders as $objOrder)
            @if($loop->index % 3 == 0)
                <div class="card-deck">
            @endif

            @include('order.view.item', ['objOrder' => $objOrder])

            @if(($loop->index + 1) % 3 == 0)
                </div>
            @endif
        @endforeach
    </div>
@endsection
