<?php

namespace App\Listeners;

use App\Events\OrderReady;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderReadyNotification
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
    public function handle(OrderReady $objEvent)
    {
        $objDrinkOrder = $objEvent->drinkorder;
        
        Mail::to($objDrinkOrder->user->email)->send(new \App\Mail\OrderReady($objDrinkOrder));
    }
}
