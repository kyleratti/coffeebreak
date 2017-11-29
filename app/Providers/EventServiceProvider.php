<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],

        // Socialite
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // add your listeners (aka providers) here
            'SocialiteProviders\Graph\GraphExtendSocialite@handle',
        ],

        // Order Events
        'App\Events\OrderPlaced' => [
            'App\Listeners\SendOrderPlacedNotification',
            'App\Listeners\SendOrderReceivedNotification',
        ],

        'App\Events\OrderReady' => [
            'App\Listeners\SendOrderReadyNotification',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
