<?php

class Position
{
    public $y;
    public $x;

    /**
     * @param $y
     * @param $x
     */
    public function __construct($y, $x)
    {
        $this->y = $y;
        $this->x = $x;
    }


}