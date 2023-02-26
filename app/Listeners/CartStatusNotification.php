<?php

namespace App\Listeners;

use App\Events\CartStatusChangedEvent;
use App\Mail\PayedCart;
use App\Models\CartStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class CartStatusNotification
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
     * @param  \App\Events\CartStatusChangedEvent  $event
     * @return void
     */
    public function handle(CartStatusChangedEvent $event)
    {
        $shopping_cart = $event->shoppingCart;

        switch($shopping_cart->status_id){
            case CartStatus::PAYMENT_SUCCESSFUL:
                Mail::send(new PayedCart($shopping_cart));
                break;
            default:
                break;

        }
    }
}
