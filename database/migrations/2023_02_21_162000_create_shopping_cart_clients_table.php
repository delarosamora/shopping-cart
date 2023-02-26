<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street');
            $table->string('number');
            $table->integer('postal_code');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart_clients');
    }
}
