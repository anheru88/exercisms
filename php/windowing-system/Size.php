<?php

class Size{
    public $height;
    public $width;

    /**
     * @param $height
     * @param $width
     */
    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }


}