<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller {
    public function show ( $slug ) {
        $product = Product::query()
                          ->where('slug' , $slug)
                          ->firstOrFail();

        return view('arses.products.show', compact('product'));
    }
}
