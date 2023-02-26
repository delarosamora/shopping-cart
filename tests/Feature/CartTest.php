<?php

namespace Tests\Feature;

use App\Models\CartStatus;
use App\Models\ShoppingCart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * Crear carrito
     *
     * @return void
     */
    public function test_create_cart()
    {
        //Creamos un carrito
        $response = $this->postJson('/api/cart/create', ['status_id' => CartStatus::IN_PROGRESS, 'total' => 0]);
        $response->assertStatus(200);

        //Creamos un carrito con estado pagado
        $response = $this->postJson('/api/cart/create', ['status_id' => CartStatus::PAYMENT_SUCCESSFUL, 'total' => 0]);
        $response->assertStatus(400);
    }

    /**
     * Añadir productos a un carrito
     *
     * @return void
     */
    public function test_add_products_to_cart()
    {
        //Creamos un carrito
        $response = $this->postJson('/api/cart/create', ['status_id' => CartStatus::IN_PROGRESS, 'total' => 0]);
        $response->assertStatus(200);

        $cartId = $response['id'];

        $response = $this->postJson("/api/cart/$cartId/set-product-quantity", ['product_id' => 1, 'quantity' => 2]);
        $response->assertStatus(200);
    }
}
