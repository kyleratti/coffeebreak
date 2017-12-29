<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Drink\DrinkOrder;

class OrderReady extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DrinkOrder $objOrder)
    {
        $this->order = $objOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('donotreply@coffee.ratti.me')
            ->subject('Your coffee order is ready!')
            ->view('emails.orders.ready')
            ->with([
                'objDrinkOrder' => $this->order,
            ]);
    }
}
