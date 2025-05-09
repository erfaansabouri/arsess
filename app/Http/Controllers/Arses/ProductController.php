<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function show ( $slug ) {
        $product = Product::query()
                          ->where('slug' , $slug)
                          ->firstOrFail();

        return view('arses.products.show' , compact('product'));
    }

    public function index () {
        $products = Product::query()
                           ->latest()
                           ->get();
        $categories = ProductCategory::query()
                                     ->parent()
                                     ->get();

        return view('arses.products.index' , compact('products' , 'categories'));
    }

    public function search ( Request $request ) {
        $products = Product::query()
                           ->where('title' , 'like' , '%' . $request->input('search') . '%')
                           ->orWhere('summary' , 'like' , '%' . $request->input('search') . '%')
                           ->latest()
                           ->get();

        return view('arses.products.search' , compact('products' ));
    }
}
