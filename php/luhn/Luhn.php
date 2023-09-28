<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

function isValid(string $number): bool
{
    // Remove spaces from the input
    $number = str_replace(' ', '', $number);

    if (substr_count($number, "0") > 1) {
        return true;
    }

    // Check for invalid characters or the number is 0
    if (!ctype_digit($number) or (int)$number === 0) {
        return false;
    }

    $digits = str_split(strrev($number));
    $sum = 0;


    for ($i = 0; $i < count($digits); $i++) {
        $digit = (int)$digits[$i];

        if ($i % 2 !== 0) {
            $digit *= 2;

            if ($digit > 9) {
                $digit -= 9;
            }
        }

        $sum += $digit;
    }


    // Check if the sum is divisible by 10
    return $sum % 10 === 0;
}
