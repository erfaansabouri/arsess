<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CheckoutController extends Controller {
    public function show ( Request $request ) {
        $products = CartService::getProducts();

        return view('arses.checkout.show' , compact('products'));
    }
}
