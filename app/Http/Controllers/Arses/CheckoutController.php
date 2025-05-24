<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\Product;
use App\Services\CartService;
use Exception;
use Illuminate\Http\Request;
use Shetabit\Payment\Facade\Payment;
use Validator;

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
                                        'message' => 'کوپن نامعتبر است' ,
                                    ]);
        }
        // check if coupon is expired
        if ( $coupon->expire_at && $coupon->expire_at < now() ) {
            return response()->json([
                                        'status' => 'error' ,
                                        'message' => 'کوپن منقضی شده است' ,
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
                                        'message' => 'مبلغ نهایی نمی تواند کمتر از 1000 باشد' ,
                                    ]);
        }
        CartService::addCouponCode($code);

        // return success response
        return response()->json([
                                    'status' => 'success' ,
                                    'message' => 'کوپن با موفقیت اعمال شد' ,
                                    'discount' => CartService::getDiscountAmount() ,
                                    'total' => CartService::getPaymentPrice() ,
                                ]);
    }

    public function doCheckout ( Request $request ) {
        // validator if failed
        $v = Validator::make($request->all() , [
            'first_name' => 'required|string|max:255' ,
            'last_name' => 'required|string|max:255' ,
            'address' => 'required|string' ,
            'postal_code' => 'required|string|max:10' ,
            'phone' => 'required|string|max:15' ,
            'email' => 'nullable|email|max:255' ,
            'national_code' => 'required|string|max:255' ,
            'description' => 'nullable|string' ,
        ]);
        if ( $v->fails() ) {
            $error_message = $v->errors()
                               ->first();

            return redirect()
                ->back()
                ->with('custom_error' , $error_message)
                ->withInput($request->all());
        }
        $invoice = new Invoice();
        $invoice->user_id = auth()->id();
        $invoice->first_name = $request->input('first_name');
        $invoice->last_name = $request->input('last_name');
        $invoice->address = $request->input('address');
        $invoice->postal_code = $request->input('postal_code');
        $invoice->national_code = $request->input('national_code');
        $invoice->phone = $request->input('phone');
        $invoice->email = $request->input('email');
        $invoice->description = $request->input('description');
        $invoice->products_price = CartService::getTotalPrice();
        $invoice->shipping_price = CartService::getShippingPrice();
        $invoice->discount = CartService::getDiscountAmount();
        $invoice->coupon_code = CartService::getCouponCode();
        $invoice->payment_price = CartService::getPaymentPrice();
        $invoice->save();
        $products = CartService::getProducts();
        foreach ( $products as $product ) {
            $invoice->invoiceItems()
                    ->create([
                                 'product_id' => $product[ 'product' ]->id ,
                                 'quantity' => $product[ 'quantity' ] ,
                                 'price' => $product[ 'price' ] ,
                             ]);
        }

        return Payment::callbackUrl(route('checkout.verify'))
                      ->purchase(( new \Shetabit\Multipay\Invoice )->amount($invoice->payment_price) , function ( $driver , $tx_id ) use ( $invoice ) {
                          $invoice->tx_id = $tx_id;
                          $invoice->save();
                      })
                      ->pay()
                      ->render();
    }

    public function verify ( Request $request ) {
        $authority = $request->input('trackId');
        $invoice = Invoice::where('tx_id' , $authority)
                          ->first();
        if ( !$invoice ) {
            return redirect()
                ->route('my-profile.show')
                ->with('custom_error' , 'فاکتور یافت نشد ');
        }
        if ( $invoice->paid_at ) {
            return redirect()
                ->route('my-profile.show')
                ->with('custom_error' , 'این فاکتور قبلا پرداخت شده است');
        }
        if ( $invoice->failed_at ) {
            return redirect()
                ->route('my-profile.show')
                ->with('custom_error' , 'این فاکتور قبلا پرداخت ناموفق داشته است');
        }
        try {
            $result = Payment::amount($invoice->payment_price)
                             ->transactionId($invoice->tx_id)
                             ->verify();
            // update invoice status
            $invoice->paid_at = now();
            $invoice->save();
            // clear cart
            CartService::clearCart();

            return redirect()
                ->route('my-profile.show')
                ->with('custom_success' , 'پرداخت با موفقیت انجام شد');
        }
        catch ( Exception $e ) {
            // update invoice status
            $invoice->failed_at = now();
            $invoice->save();

            return redirect()
                ->route('my-profile.show')
                ->with('custom_error' , 'پرداخت ناموفق بود: ' . $e->getMessage());
        }
    }
}
