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

class Robot
{
    const DIRECTION_NORTH = "NORTH";
    const DIRECTION_SOUTH = "SOUTH";
    const DIRECTION_EAST = "EAST";
    const DIRECTION_WEST = "WEST";

    /**
     *
     * @var int[]
     */
    public $position;

    /**
     *
     * @var string
     */
    public $direction;

    /**
     * @param array $position
     * @param string $direction
     */
    public function __construct(array $position, string $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    public function turnRight(): self
    {
        switch ($this->direction) {
            case static::DIRECTION_NORTH:
                $this->direction = static::DIRECTION_EAST;
                break;
            case static::DIRECTION_EAST:
                $this->direction = static::DIRECTION_SOUTH;
                break;
            case static::DIRECTION_SOUTH:
                $this->direction = static::DIRECTION_WEST;
                break;
            case static::DIRECTION_WEST:
                $this->direction = static::DIRECTION_NORTH;
                break;
        }

        return $this;
    }

    public function turnLeft(): self
    {
        switch ($this->direction) {
            case static::DIRECTION_NORTH:
                $this->direction = static::DIRECTION_WEST;
                break;
            case static::DIRECTION_WEST:
                $this->direction = static::DIRECTION_SOUTH;
                break;
            case static::DIRECTION_SOUTH:
                $this->direction = static::DIRECTION_EAST;
                break;
            case static::DIRECTION_EAST:
                $this->direction = static::DIRECTION_NORTH;
                break;
        }

        return $this;
    }

    public function advance(): self
    {
        switch ($this->direction) {
            case static::DIRECTION_NORTH:
                $this->position[1] = $this->position[1] + 1;
                break;
            case static::DIRECTION_WEST:
                $this->position[0] = $this->position[0] - 1;
                break;
            case static::DIRECTION_SOUTH:
                $this->position[1] = $this->position[1] - 1;
                break;
            case static::DIRECTION_EAST:
                $this->position[0] = $this->position[0] + 1;
                break;
        }

        return $this;
    }

    public function instructions(string $instructions)
    {
        if (!preg_match('/^[LRA]+$/', $instructions)) {
            throw new InvalidArgumentException();
        }

        foreach (str_split($instructions) as $instruction) {
            switch ($instruction) {
                case "R":
                    $this->turnRight();
                    break;
                case "L":
                    $this->turnLeft();
                    break;
                case "A":
                    $this->advance();
                    break;
            }
        }
    }
}
