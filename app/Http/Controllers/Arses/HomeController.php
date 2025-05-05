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
        $categories = ProductCategory::all();
        $newest_products = Product::query()
                                  ->latest()
                                  ->take(6)
                                  ->get();

        return view('arses.home.index' , compact('banners' , 'categories', 'newest_products'));
    }
}
