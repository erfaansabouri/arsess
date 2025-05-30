<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\ProductCategory;

class HomeController extends Controller {
    public function index () {
        $banners = Banner::query()
                         ->get();
        $categories = ProductCategory::query()
                                     ->parent()
                                     ->get();
        $newest_products = Product::query()
                                  ->latest()

                                  ->take(6)
                                  ->get();
        $newest_mavad_avalie_products = Product::query()
                                  ->latest()
                                  ->whereHas('categories' , function ( $q ) {
                                      $q->where('product_categories.id' , 8);
                                  })
                                  ->take(6)
                                  ->get();
        $selected_products = Product::query()
                                    ->where('is_selected' , true)
                                    ->latest()
                                    ->get();

        return view('arses.home.index' , compact('banners' , 'categories' , 'newest_products' , 'selected_products', 'newest_mavad_avalie_products'));
    }
}
