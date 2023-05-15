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

class UniqueNames
{
    private static $instances = [];

    public array $names = [];

    public static function getInstance(): UniqueNames
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}

class Robot
{
    private $name = null;

    const CHARACTERS = 'abcdefghijklmnopqrstuvwxyz';

    public function getName(): string
    {
        if (is_null($this->name)) {
            $uniqueNames = UniqueNames::getInstance();

            while (true) {
                for ($i = 0; $i < 2; $i++) {
                    $this->name .= static::CHARACTERS[random_int(0, strlen(static::CHARACTERS) - 1)];
                }
                for ($i = 0; $i < 3; $i++) {
                    $this->name .= random_int(0, 9);
                }
                if (!in_array($this->name, $uniqueNames->names)) {
                    $uniqueNames->names[] = $this->name;
                    break;
                }
                $this->name = null;
            }
        }

        return $this->name;
    }

    public function reset(): void
    {
        $this->name = null;
    }
}
