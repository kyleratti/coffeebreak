<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Mail;

class OrderPlaced
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPlaced  $objEvent
     * @return void
     */
    public function handle(OrderPlaced $objEvent)
    {
        $objDrinkOrder = $objEvent->drinkorder;

        Mail::to($objDrinkOrder->user->email)->send(new OrderPlaced($objDrinkOrder));
    }
}
