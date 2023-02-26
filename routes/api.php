<?php

use App\Http\Controllers\Api\ProductController as ProductControllerApi;
use App\Http\Controllers\Api\ShoppingCartController as ApiShoppingCartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cart/{cartId}', [ApiShoppingCartController::class, 'show'])->name('api.cart.show');
Route::post('cart/{cartId}/set-product-quantity', [ApiShoppingCartController::class, 'setProductQuantity'])->name('api.cart.set-product-quantity');
Route::post('cart/{cartId}/delete-product', [ApiShoppingCartController::class, 'deleteProduct'])->name('api.cart.delete-product');
Route::post('cart/{cartId}/set-status', [ApiShoppingCartController::class, 'setStatus'])->name('api.cart.set-status');
Route::post('cart/{cartId}/save-client', [ApiShoppingCartController::class, 'saveClient'])->name('api.cart.saveClient');
Route::post('cart/create', [ApiShoppingCartController::class, 'create'])->name('api.cart.create');
Route::get('cart/pending-cart/get', [ApiShoppingCartController::class, 'getPending'])->name('api.cart.pending-cart');

Route::get('products', [ProductControllerApi::class, 'index'])->name('api.products');
