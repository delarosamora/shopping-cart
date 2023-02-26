<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'product_shopping_cart';

    protected $fillable = ['product_id', 'shopping_cart_id', 'quantity'];
}
