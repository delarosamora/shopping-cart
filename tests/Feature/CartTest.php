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

        //Añadimos productos
        $response = $this->postJson("/api/cart/$cartId/set-product-quantity", ['product_id' => 1, 'quantity' => 2]);
        $response->assertStatus(200);
    }

    /**
     * Pagar un carrito
     *
     * @return void
     */
    public function test_pay_cart()
    {
        //Creamos un carrito
        $response = $this->postJson('/api/cart/create', ['status_id' => CartStatus::IN_PROGRESS, 'total' => 0]);
        $response->assertStatus(200);

        $cartId = $response['id'];

        //Añadimos producto
        $response = $this->postJson("/api/cart/$cartId/set-product-quantity", ['product_id' => 1, 'quantity' => 2]);
        $response->assertStatus(200);

        //Creamos un cliente en el checkout
        $response = $this->postJson("/api/cart/$cartId/save-client", [
            'name' => 'Alvaro de la Rosa',
            'street' => 'Plaza del Mercado del Sur',
            'number' => '10',
            'postal_code' => '33207',
            'city' => 'Gijon',
            'province' => 'Asturias',
            'country' => 'España',
            'email' => 'alvaro@mail.com',
        ]);
        $response->assertStatus(200);

        //Lo pagamos
        $response = $this->postJson("/api/cart/$cartId/set-status", ['status_id' => CartStatus::PAYMENT_SUCCESSFUL]);
        $response->assertStatus(200);


    }

    /**
     * Añadir productos a un carrito pagado
     *
     * @return void
     */
    public function test_add_or_delete_products_to_payed_cart()
    {
        //Creamos un carrito
        $response = $this->postJson('/api/cart/create', ['status_id' => CartStatus::IN_PROGRESS, 'total' => 0]);
        $response->assertStatus(200);

        $cartId = $response['id'];

        //Añadimos producto
        $response = $this->postJson("/api/cart/$cartId/set-product-quantity", ['product_id' => 1, 'quantity' => 2]);
        $response->assertStatus(200);

        //Creamos un cliente en el checkout
        $response = $this->postJson("/api/cart/$cartId/save-client", [
            'name' => 'Alvaro de la Rosa',
            'street' => 'Plaza del Mercado del Sur',
            'number' => '10',
            'postal_code' => '33207',
            'city' => 'Gijon',
            'province' => 'Asturias',
            'country' => 'España',
            'email' => 'alvaro@mail.com',
        ]);
        $response->assertStatus(200);

        //Lo pagamos
        $response = $this->postJson("/api/cart/$cartId/set-status", ['status_id' => CartStatus::PAYMENT_SUCCESSFUL]);
        $response->assertStatus(200);

        //Volvemos a añadir un producto
        $response = $this->postJson("/api/cart/$cartId/set-product-quantity", ['product_id' => 2, 'quantity' => 2]);
        $response->assertStatus(400);

        //Borramos un producto
        $response = $this->postJson("/api/cart/$cartId/delete-product", ['product_id' => 2]);
        $response->assertStatus(400);

    }
}
