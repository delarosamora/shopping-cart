<?php

namespace App\Models;

use App\Exceptions\CartWithoutClientException;
use App\Exceptions\TotalCartNotPositiveException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;

class ShoppingCart extends Model
{
    use HasFactory;

    #region RELATIONS

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function status(){
        return $this->belongsTo(CartStatus::class);
    }

    public function client(){
        return $this->belongsTo(ShoppingCartClient::class);
    }
    
    #endregion

    #region SETTER

    public function setProductQuantity(Product $product, int $quantity){
        ProductShoppingCart::updateOrCreate(
            [
                'product_id' => $product->id,
                'shopping_cart_id' => $this->id,
            ],
            [
                'quantity' => $quantity
            ]
            );
    }

    public function updateClient(ShoppingCartClient $client){
        $this->client_id = $client->id;
        $this->save();
    }

    public function setStatus($statusId){
        $this->status_id = $statusId;
        switch ($statusId){
            case CartStatus::PAYMENT_SUCCESSFUL:
                if (!$this->client){
                    throw new CartWithoutClientException();
                }

                if ($this->total <= 0){
                    throw new TotalCartNotPositiveException();
                }
                break;
            default:
                break;
        }
        $this->save();
    }

    public function updateTotalPrice(){
        $products = $this->products;

        $total = $products->sum(function (Product $product){
            $quantity = $product->pivot->quantity;
            $price = $product->price;
            return $quantity*$price;
        });

        $this->total = $total;
        $this->save();

    }

    #endregion

    #region GETTER

    public function statusIs($statusId){
        return $this->status_id = $statusId;
    }

    public function statusIsNot($statusId){
        return !$this->statusIs($statusId);
    }

    #endregion
}
