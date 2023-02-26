<?php

use App\Http\Controllers\Web\CheckoutController as CheckoutControllerWeb;
use App\Http\Controllers\Web\ProductController as ProductControllerWeb;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('products.index');
});

Route::get('products', [ProductControllerWeb::class, 'index'])->name('web.products');
Route::get('checkout', [CheckoutControllerWeb::class, 'index'])->name('web.checkout');
