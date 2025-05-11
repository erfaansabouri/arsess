<?php

namespace App\Services;
use App\Models\PriceSetting;
use App\Models\Product;

class CartService {
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
        return PriceSetting::query()->firstOrCreate([])->shipping_price;
    }
}
