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

class ResistorColorTrio
{
    private const COLORS = [
        "black",
        "brown",
        "red",
        "orange",
        "yellow",
        "green",
        "blue",
        "violet",
        "grey",
        "white",
    ];

    public function label(array $colors): string
    {
        $value = '';
        $value .= $this->colorCode($colors[0]);
        $value .= $this->colorCode($colors[1]);
        $value .= str_repeat('0', $this->colorCode($colors[2]));
        $ohms = ' ohms';

        $value = intval($value);

        if ($value > 0) {
            if ($value % 1000000000 === 0) {
                $value = $value / 1000000000;
                $ohms = ' gigaohms';
            }

            if ($value % 1000000 === 0) {
                $value = $value / 1000000;
                $ohms = ' megaohms';
            }

            if ($value % 1000 === 0) {
                $value = $value / 1000;
                $ohms = ' kiloohms';
            }
        }

        return $value.$ohms;
    }

    private function colorCode(string $color): int
    {
        return array_search($color, self::COLORS);
    }
}
