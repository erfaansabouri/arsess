<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\PriceSetting;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function show ( Request $request ) {
        $user = auth('web')->user();
        $cart_items = $user->cartItems()
                           ->with('product')
                           ->get();
        $shipping_price = PriceSetting::query()->firstOrCreate([])->shipping_price;

        return view('arses.cart.show' , compact('cart_items', 'user', 'shipping_price'));
    }

    public function remove ( $id ) {
        $user = auth('web')->user();
        $cart_item = $user->cartItems()
                          ->where('id' , $id)
                          ->firstOrFail();
        $cart_item->delete();

        return redirect()
            ->back()
            ->with('success' , 'آیتم با موفقیت حذف شد');
    }
}
