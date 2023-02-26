<?php

namespace App\Http\Controllers\Api;

use App\Events\CartStatusChangedEvent;
use App\Exceptions\CartWithoutClientException;
use App\Exceptions\TotalCartNotPositiveException;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteProductFromCartRequest;
use App\Http\Requests\SaveClientRequest;
use App\Http\Requests\SaveShoppingCartRequest;
use App\Http\Requests\SetProductQuantityRequest;
use App\Http\Requests\SetStatusRequest;
use App\Models\CartStatus;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartClient;
use Cookie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    use ApiResponseHelpers;
    public function show($cartId){

        try{
            $shoppingCart = ShoppingCart::with('products')->with('status')->with('client')->findOrFail($cartId);
            return $this->respondWithSuccess($shoppingCart);
        }catch(ModelNotFoundException $e){
            return $this->respondNotFound('Not found');
        }
    }

    public function create(SaveShoppingCartRequest $request){
        try{
            $shoppingCart = new ShoppingCart();
            $shoppingCart->total = $request->total;
            $shoppingCart->setStatus($request->status_id);
    
            $cookie = cookie('cart', $shoppingCart->id, 300);
    
            return $this->respondWithSuccess(ShoppingCart::with('products')->with('status')->with('client')->findOrFail($shoppingCart->id))->withCookie($cookie);
        }catch(TotalCartNotPositiveException $e){
            return $this->respondError("Por favor añade productos al carrito");
        }
        catch(CartWithoutClientException $e){
            return $this->respondError("Por favor añade un cliente");
        }
    }

    public function setProductQuantity($cartId, SetProductQuantityRequest $request){
        try{
            $shoppingCart = ShoppingCart::with('products')->with('status')->findOrFail($cartId);;
            $product = Product::findOrFail($request->product_id);
            $shoppingCart->setProductQuantity($product, $request->quantity);
            $shoppingCart->refresh();
            $shoppingCart->updateTotalPrice();
            return $this->respondWithSuccess(ShoppingCart::with('products')->with('status')->with('client')->findOrFail($cartId));
        }catch(ModelNotFoundException $e){
            return $this->respondNotFound('Not found');
        }
    }

    public function deleteProduct($cartId, DeleteProductFromCartRequest $request){
        try{
            $shoppingCart = ShoppingCart::findOrFail($cartId);
            $product = Product::findOrFail($request->product_id);
            $shoppingCart->products()->detach($product->id);
            $shoppingCart->updateTotalPrice();
            return $this->respondWithSuccess(ShoppingCart::with('products')->with('status')->with('client')->findOrFail($cartId));
        }catch(ModelNotFoundException $e){
            return $this->respondNotFound('Not found');
        }
    }

    public function setStatus($cartId, SetStatusRequest $request){
        try{
            $shoppingCart = ShoppingCart::findOrFail($cartId);
            $status = CartStatus::findOrFail($request->status_id);
            $shoppingCart->setStatus($status->id);
            event(new CartStatusChangedEvent($shoppingCart));
            return $this->respondWithSuccess(ShoppingCart::with('products')->with('status')->with('client')->findOrFail($cartId));
        }catch(ModelNotFoundException $e){
            return $this->respondNotFound('Not found');
        }
        catch(CartWithoutClientException $e){
            return $this->respondError("Por favor añade un cliente");
        }
        catch(TotalCartNotPositiveException $e){
            return $this->respondError("Por favor añade productos al carrito");
        }
    }

    public function saveClient($cartId, SaveClientRequest $request){
        try{
            $shoppingCart = ShoppingCart::findOrFail($cartId);
            $cartClient = ShoppingCartClient::updateOrCreate(
                ['id' => $shoppingCart->client_id],
                [
                    'name' => $request->name,
                    'street' => $request->street,
                    'number' => $request->number,
                    'postal_code' => $request->postal_code,
                    'city' => $request->city,
                    'province' => $request->province,
                    'country' => $request->country,
                    'email' => $request->email,
                ]
                );
                $shoppingCart->updateClient($cartClient);
            return $this->respondWithSuccess(ShoppingCart::with('products')->with('status')->with('client')->findOrFail($cartId));
        }catch(ModelNotFoundException $e){
            return $this->respondNotFound('Not found');
        }
    }

    public function getPending(Request $request){
        try{
            $cartId = $request->cookie('cart');

            if (is_null($cartId)){
                throw new ModelNotFoundException();
            }
            $shoppingCart = ShoppingCart::with('products')->with('status')->with('client')->findOrFail($cartId);
            if ($shoppingCart->status_id == CartStatus::PAYMENT_SUCCESSFUL){
                throw new ModelNotFoundException();
            }
            return $this->respondWithSuccess($shoppingCart);
        }catch(ModelNotFoundException $e){
            return $this->respondNotFound('Not found');
        }
    }
}
