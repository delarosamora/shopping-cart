<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

class CheckoutController extends Controller
{
    public function index(Request $request){
        return view('checkout.index');
    }
}
