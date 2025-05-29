<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService {
    public static function send ( $phone , $template , $tokens ) {
        $tokenString = implode(';' , $tokens);
        Http::post('https://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber' , [
            'username' => '09121149626' ,
            'password' => '@3$#4' ,
            'to' => $phone ,
            'bodyId' => $template ,
            'text' => $tokenString ,
        ]);
    }
}
