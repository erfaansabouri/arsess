<?php

namespace App\Services;
class Fixer {
    public static function englishNumbers ( $string ) {

        if ( is_string($string) ) {
            $persian_digits = [
                '۰' ,
                '۱' ,
                '۲' ,
                '۳' ,
                '۴' ,
                '۵' ,
                '۶' ,
                '۷' ,
                '۸' ,
                '۹' ,
            ];
            $arabic_digits = [
                '٩' ,
                '٨' ,
                '٧' ,
                '٦' ,
                '٥' ,
                '٤' ,
                '٣' ,
                '٢' ,
                '١' ,
                '٠' ,
            ];
            $all_digits = array_merge($persian_digits , $arabic_digits);
            $replaces = [
                ...range(0 , 9) ,
                ...range(0 , 9) ,
            ];

            return str_replace($all_digits , $replaces , $string);
        }

        return null;
    }
}
