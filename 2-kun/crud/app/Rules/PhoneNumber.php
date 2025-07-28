<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     * @param $valuevalue
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail, ): void
    {
        if (!preg_match('/^\+998\d{9}$/', $value)) {
            $fail('Telefon raqam formati noto‘g‘ri. Masalan: +998901234567');
    }
}}
