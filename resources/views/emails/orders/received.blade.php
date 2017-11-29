@extends('emails.template')

@section('title', 'Coffee order received')

@section('content')
    <h1>Coffee Order Received</h1>

    <p>We're writing to give you a heads up that a new coffee order has been placed. We've also updated the order tracking page automatically.</p>

    <p>Here's the details of the order, just in case:</p>

    <table>
        <tr>
            <th>Ordered By</th>
            <td>{{ $objDrinkOrder->user->display_name }} ({{ $objDrinkOrder->user->email }})</td>
        </tr>

        <tr>
            <th>Drink</th>
            <td>{{ $objDrinkOrder->drink->name }}</td>
        </tr>

        <tr>
            <th>Shots</th>
            <td>{{ $objDrinkOrder->shots }} espresso shot{{ $objDrinkOrder->shots != 1 ? 's' : '' }}</td>
        </tr>

        <tr>
            <th>Milk</th>
            <td>{{ $objDrinkOrder->getMilkType() }} milk</td>
        </tr>
    </table>
@endsection
