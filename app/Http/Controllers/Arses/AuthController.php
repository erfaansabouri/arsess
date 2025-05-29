<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\IranPhoneRule;
use App\Services\CartService;
use App\Services\Fixer;
use App\Services\SmsService;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function getSmsForm ( Request $request ) {
        return view('arses.auth.get-sms');
    }

    public function verifyCodeForm ( Request $request ) {
        return view('arses.auth.verify-code');
    }

    public function getSms ( Request $request ) {
        $request->validate([
                               'phone' => [
                                   'required' ,
                                   new IranPhoneRule() ,
                               ] ,
                           ] , [
                               'phone.required' => 'لطفا شماره موبایل خود را به صورت صحیح و با اعداد انگلیسی وارد نمایید.' ,
                           ]);
        $phone = Fixer::englishNumbers($request->get('phone'));
        $user = User::query()
                    ->firstOrCreate([
                                        'phone' => $phone ,
                                    ]);
        $user->otp = rand(10000,99999);
        $user->save();

        SmsService::send($phone, '334437', [
            $user->otp
        ]);
        return redirect()->route('auth.verify-code-form' , [ 'phone' => $phone ]);
    }

    public function verifyCode ( Request $request ) {
        $request->validate([
                               'phone' => [
                                   'required' ,
                                   new IranPhoneRule() ,
                               ] ,
                               'code' => [
                                   'required' ,
                                   'numeric' ,
                               ] ,
                           ],[
                                 'phone.required' => 'لطفا شماره موبایل خود را به صورت صحیح و با اعداد انگلیسی وارد نمایید.' ,
                                 'code.required' => 'لطفا کد تایید را وارد نمایید.' ,
                                 'code.numeric' => 'لطفا کد تایید را به صورت صحیح و با اعداد انگلیسی وارد نمایید.' ,
        ]);
        $phone = Fixer::englishNumbers($request->get('phone'));
        $code = Fixer::englishNumbers($request->get('code'));
        $user = User::query()
                    ->where('phone' , $phone)
                    ->firstOrFail();
        if ( $user->otp == $code ) {
            $user->otp = null;
            $user->save();
            auth()->login($user);

            if (!empty(CartService::getCart())){
                return redirect()->route('checkout.show');
            }

            return redirect()->route('my-profile.show');
        }

        return redirect()
            ->back()
            ->withErrors([
                             'code' => 'کد وارد شده صحیح نمی باشد' ,
                         ])
            ->withInput($request->only('phone'));
    }
}
