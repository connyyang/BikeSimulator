<?php
include 'Direction.php';

Class Bike {
    CONST CAR = "car";
    CONST BIKE = "bike";
    CONST MOTOBIKE = "motorbike";
    CONST DIRECTIONS = ["NORTH", "EAST", "SOUTH", "WEST"]; //Based on clockwise.

    public $type;
    public $model;
    public $x = 0;
    public $y = 0;
    public $gridX = 7;
    public $gridY = 7;  
    public $isStart = false;

    function __constructor($type, $model) {
        $this->type = $type;
        $this->model = $model;
    }

    function validateIsStart() {
        // Check if initial location has been placed or not
        if (!$this->isStart) {
            echo "ERROR 2001: You need to set initial place location by setting PLACE. <i.e. PLACE 0,5,NORTH> \n";
            return;
            //return throw new Exception('You need to set initial place location by setting PLACE. <i.e. PLACE 0,5,NORTH>');
        }
        return $this->isStart;
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

    function initPlace($x, $y, $direction) {
        // Check if initial location already been placed to prevent duplicate initilization.
        if ($this->isStart) {
            echo "ERROR 2003: You cannot place location multiple times! \n";
            return;
            //return throw new Exception('You cannot place location multiple times!');
        }

        // validate x, y and direction
        if (empty($x) || !is_numeric($x) || empty($y) || !is_numeric($y) ||
            empty($direction) || !in_array(strtoupper($direction), SELF::DIRECTIONS)) {
                echo "ERROR 1004: Invalid input for PLACE! <i.e. PLACE 0,5,NORTH> \n";
                return;
                //return throw new Exception('Invalid input for PLACE! <i.e. PLACE 0,5,NORTH>');
        }

        // convert string to integer
        $x = intval($x);
        $y = intval($y);

        // validate x, y with gridX and gridY
        if ($this->validateLocation($x, $y)) {
            $this->isStart = true;
            $this->x = $x;
            $this->y = $y;
            $this->direction = strtoupper($direction);   
        }
        
    }

    function turn($type) {
        // check if initial place location not set, return empty
        if (!$this->validateIsStart()) return;

        Direction::

        $currentPos = array_search($this->direction, SELF::DIRECTIONS);
        // change direction based on clockwise or anticlockwise
        switch($type) {
            case "LEFT": 
                $currentPos = $currentPos == 0 ? (count(SELF::DIRECTIONS) - 1): ($currentPos - 1);
                break;
            case "RIGHT": 
                $currentPos = $currentPos == (count(SELF::DIRECTIONS) - 1) ? 0: ($currentPos + 1);
                break;
            default: 
                break;
        }
        
        $this->direction = SELF::DIRECTIONS[$currentPos];
    }

    function forward($direction="") {
        // check if initial place location not set, return empty
        if (!$this->validateIsStart()) return;

        $direction = $direction ? $direction : $this->direction;

        switch($direction) {
            case "NORTH": 
                $this->y ++;
                break;
            case "SOUTH": 
                $this->y --;
                break;
            case "EAST": 
                $this->x ++;
                break;
            case "WEST": 
                $this->x --;
                break;
        }

        // validate x, y with gridX and gridY
        $this->validateLocation($this->x, $this->y);
    }

    function gpsReport($x = "", $y = "", $direction = "") {
        // check if initial place location not set, return empty
        if (!$this->validateIsStart()) return;

        $x = $x !== "" ? $x : $this->x;
        $y = $y !== "" ? $y : $this->y;
        $direction = $direction ? $direction : $this->direction;
        
        $msg = sprintf("(%d, %d), %s", $x, $y, $direction);

        echo $msg."\n";
    }

}