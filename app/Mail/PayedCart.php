<?php

namespace App\Mail;

use App\Models\ShoppingCart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PayedCart extends Mailable
{
    use Queueable, SerializesModels;

    private ShoppingCart $shoppingCart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ShoppingCart $shoppingCart)
    {
        $this->shoppingCart = $shoppingCart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->shoppingCart->client->email);
        $this->subject('Su pedido está en proceso');
        $this->markdown('emails.carts.payed')
        ->with('cart', $this->shoppingCart)
        ->with('client', $this->shoppingCart->client);
    }
}
