<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class IranPhoneRule implements ValidationRule {
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate ( string $attribute , mixed $value , Closure $fail ): void {
        if ( !preg_match('/^(0)?9\d{9}$/' , $value) ) {
            $fail('فرمت شماره تلفن معتبر نمیباشد.');
        }
    }
}
