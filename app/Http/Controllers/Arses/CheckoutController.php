<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CheckoutController extends Controller {
    public function show ( Request $request ) {
        $products = CartService::getProducts();

        return view('arses.checkout.show' , compact('products'));
    }

    // check coupon
    public function checkCoupon ( Request $request ) {
        $code = $request->input('code');
        $total = CartService::getTotalPrice() + CartService::getShippingPrice();
        // check if coupon exists
        $coupon = Coupon::where('code' , $code)
                                    ->first();
        // persian response
        if ( !$coupon ) {
            return response()->json([
                                        'status' => 'error' ,
                                        'message' => 'کوپن نامعتبر است',
                                    ]);
        }
        // check if coupon is expired
        if ( $coupon->expire_at && $coupon->expire_at < now() ) {
            return response()->json([
                                        'status' => 'error' ,
                                        'message' => 'کوپن منقضی شده است',
                                    ]);
        }
        // apply coupon percent
        $discount = $coupon->discount_percent;
        $discountAmount = ( $total * $discount ) / 100;
        $totalAfterDiscount = $total - $discountAmount;
        // check if total after discount is less than 0
        if ( $totalAfterDiscount < 1000 ) {
            return response()->json([
                                        'status' => 'error' ,
                                        'message' => 'مبلغ نهایی نمی تواند کمتر از 1000 باشد',
                                    ]);
        }

        CartService::addCouponCode( $code );

        // return success response
        return response()->json([
                                    'status' => 'success' ,
                                    'message' => 'کوپن با موفقیت اعمال شد' ,
                                    'discount' => CartService::getDiscountAmount() ,
                                    'total' => CartService::getPaymentPrice(),
                                ]);
    }
}
