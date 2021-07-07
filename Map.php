<?php

class Map {
    public $gridX;
    public $gridY;

    function __construct($gridX, $gridY) {
        $this->gridX = $gridX;
        $this->gridY = $gridY;
    }

    function validateLocation($x, $y, $gridX = "", $gridY = "") {
        $gridX = $gridX !== "" ? $gridX : $this->gridX;
        $gridY = $gridY !== "" ? $gridY : $this->gridY;

        if ($x <0 || $x > ($gridX - 1) || $y <0 || $y > ($gridY - 1)) {
           echo "ERROR 2002: Oops! Out of track! \n";
           return false;
           //return throw new Exception('Oops! Out of track!');
        }

        return true;
    } 
}