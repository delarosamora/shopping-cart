<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use F9Web\ApiResponseHelpers;

class ProductController extends Controller
{
    use ApiResponseHelpers;
    public function index(){
        return $this->respondWithSuccess(Product::all());
    }
}
