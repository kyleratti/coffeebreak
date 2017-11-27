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
     * @param  OrderReady  $event
     * @return void
     */
    public function handle(OrderReady $event)
    {
        //
    }
}
