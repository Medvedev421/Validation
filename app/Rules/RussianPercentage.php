<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RussianPercentage implements ValidationRule
{
    private int $minPercent;

    public function __construct(int $minPercent = 50)
    {
        $this->minPercent = $minPercent;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $string = (string) $value;

        $string = preg_replace('/\s+/u', '', $string);

        $totalLength = mb_strlen($string);

        if ($totalLength === 0) {
            $fail('Поле не должно быть пустым.');
            return;
        }

        preg_match_all('/[а-яё]/iu', $string, $matches);
        $russianCount = count($matches[0]);

        $percent = ($russianCount / $totalLength) * 100;

        if ($percent < $this->minPercent) {
            $fail("Минимум {$this->minPercent}% символов должны быть русскими.");
        }
    }
}
