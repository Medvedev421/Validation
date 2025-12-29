<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RussianPhone implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $phone = preg_replace('/[^0-9+]/', '', $value);

        $pattern = '/^(\+7|7|8)\d{10}$/';

        if (!preg_match($pattern, $phone)) {
            $fail('Введите корректный российский номер телефона.');
        }
    }
}
