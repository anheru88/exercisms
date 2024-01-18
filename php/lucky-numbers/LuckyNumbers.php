<?php

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        return intval(implode('', $digitsOfNumber1)) + intval(implode('', $digitsOfNumber2));
    }

    public function isPalindrome(int $number): bool
    {
        $reverse = strrev($number);

        return $number == $reverse;
    }

    public function validate(string $input): string
    {
        $input = trim($input);

        if ($input === '') {
            return 'Required field';
        }

        $input = floatval($input);

        if (!ctype_digit($input) && !is_numeric($input) || $input <= 0 || $input != intval($input)) {
            return 'Must be a whole number larger than 0';
        }

        return '';
    }
}
