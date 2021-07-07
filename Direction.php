<?php

class Direction {

    CONST DIRECTIONS = ["NORTH", "EAST", "SOUTH", "WEST"]; //Based on clockwise sequence. 

    public static function getTurnedDirection($current, $turn) {
        $currentPos = array_search($current, SELF::DIRECTIONS);

        switch($turn) {
            case "LEFT": 
                $currentPos = $currentPos == 0 ? (count(SELF::DIRECTIONS) - 1): ($currentPos - 1);
                break;
            case "RIGHT": 
                $currentPos = $currentPos == (count(SELF::DIRECTIONS) - 1) ? 0: ($currentPos + 1);
                break;
            default: 
                return $current;
                break;
        }

        return SELF::DIRECTIONS[$currentPos];
    }
}