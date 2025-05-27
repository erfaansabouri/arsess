<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\PriceSetting;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\CartService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function show ( Request $request ) {
        $products = CartService::getProducts();
        if ( count($products) == 0 ) {
            return view('arses.cart.empty-card');
        }

        return view('arses.cart.show2' , compact('products'));
    }

    public function remove ( $product_id ) {
        $cart = CartService::getCart();
        if ( !isset($cart[ $product_id ]) ) {
            return redirect()->back();
        }
        CartService::removeFromCart($product_id);

        return redirect()
            ->back()
            ->with('custom_success' , 'آیتم  از سبد خرید با موفقیت حذف شد');
    }

    public function add ( $product_id ) {
        $product = Product::query()
                          ->where('id' , $product_id)
                          ->first();
        if ( !$product ) {
            return redirect()
                ->back()
                ->with('custom_error' , 'محصولی برای اضافه کردن وجود ندارد');
        }
        if ( CartService::getQuantityOfProduct($product_id) >= $product->stock ) {
            return redirect()
                ->back()
                ->with('custom_error' , 'موجودی محصول به اتمام رسیده است');
        }
        CartService::addToCart($product_id);

        return redirect()
            ->back()
            ->with('open_side_cart' , true);
    }
}
