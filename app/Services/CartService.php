<?php

namespace App\Services;
use App\Models\Coupon;
use App\Models\PriceSetting;
use App\Models\Product;

class CartService {

    public static function addCouponCode ($code) {
        session()->put('coupon_code', $code); // Store the coupon code in the session
    }
    public static function addToCart ($product_id, $quantity = 1) {
        $cart = session()->get('cart', []); // Retrieve the current cart from the session, or an empty array if none exists

        // Check if the product is already in the cart
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity; // If so, update the quantity
        } else {
            // Otherwise, add the new product
            $cart[$product_id] = [
                'product_id' => $product_id,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);
    }

    public static function getCart () {
        return session()->get('cart', []);
    }

    public static function removeFromCart ($product_id) {
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]); // Remove the product from the cart
        }

        session()->put('cart', $cart);
    }

    public static function clearCart () {
        session()->forget('cart'); // Clear the cart from the session
    }

    // total price
    public static function getTotalPrice () {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $total += $product->price * $item['quantity']; // Calculate the total price
            }
        }

        return $total;
    }

    // get cart with products and quantity and price of each product
    public static function getProducts () {
        $cart = session()->get('cart', []);
        $products = [];

        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'price' => $product->price * $item['quantity'], // Calculate the price for each product
                ];
            }
        }

        return $products;
    }

    // total quantity
    public static function getTotalQuantity () {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['quantity']; // Calculate the total quantity
        }

        return $total;
    }

    // get shipping price
    public static function getShippingPrice () {
        return 0;
        //return PriceSetting::query()->firstOrCreate([])->shipping_price;
    }

    public static function getPaymentPrice () {
        // decrese coupon if valid
        $total = self::getTotalPrice() + self::getShippingPrice();
        if (session()->has('coupon_code')) {
            $code = session()->get('coupon_code');
            $coupon = Coupon::where('code', $code)->first();
            if ($coupon && ($coupon->expire_at && $coupon->expire_at > now()) || !$coupon->expire_at) {
                $discount = $coupon->discount_percent;
                $discountAmount = ($total * $discount) / 100;
                $total -= $discountAmount;
            }
        }
        // check if total after discount is less than 1000
        if ($total < 1000) {
            $total = 1000;
        }
        return $total;
    }

    // get discount amount
    public static function getDiscountAmount () {
        $total = self::getTotalPrice() + self::getShippingPrice();
        if (session()->has('coupon_code')) {
            $code = session()->get('coupon_code');
            $coupon = Coupon::where('code', $code)->first();
            if ($coupon && ($coupon->expire_at && $coupon->expire_at > now()) || !$coupon->expire_at) {
                $discount = $coupon->discount_percent;
                $discountAmount = ($total * $discount) / 100;
                return $discountAmount;
            }
        }
        return 0;
    }

    public static function getCouponCode () {
        if (session()->has('coupon_code')) {
            return session()->get('coupon_code');
        }
        return null;
    }

    public static function getQuantityOfProduct ($product_id) {
        $cart = session()->get('cart', []);
        if (isset($cart[$product_id])) {
            return $cart[$product_id]['quantity']; // Return the quantity of the specified product
        }
        return 0; // If the product is not in the cart, return 0
    }

    public static function checkProductQuantityWithStockOfProduct () {
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product && $item['quantity'] > $product->stock) {
                return false; // If any product in the cart exceeds its stock, return false
            }
        }
        return true; // All products in the cart are within their stock limits
    }
}
