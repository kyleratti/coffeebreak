<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use App\User\User;

class SendOrderReceivedNotification
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
     * @param  OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $objEvent)
    {
        $objDrinkOrder = $objEvent->drinkorder;
        
        $objBaristas = User::where('email', config('app.baristas')[0])->orWhere('email', config('app.baristas'[1]))->get();
        
        foreach($objBaristas as $objBarista)
        {
            Mail::to($objBarista->email)->send(new \App\Mail\OrderReceived($objDrinkOrder));
        }
    }
}
