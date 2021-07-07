<?php
include 'Bike.php';
include 'Map.php';

// Set map as 7x7 in hardcode temporarily
$map = new Map(7, 7);
$bike = new Bike($map);

while(1) {
    $op = readline('Enter your operation: ');

    $opParams = explode(' ', trim($op));

    if (!empty($opParams[0])) {
        $operator = strtoupper($opParams[0]);
        // exit the loop
        if ($operator == 'EXIT') break;

        switch($operator) {
            case "PLACE": 
                if (empty($opParams[1])) {
                    echo "ERROR 1001 : Invalid input! \n";
                } else {
                    $locParams = array_map('trim', explode(',', $opParams[1]));
                    if (!empty($locParams) && count($locParams) == 3) {
                        $bike->place($locParams[0], $locParams[1], $locParams[2]);
                    } else {
                        echo "ERROR 1002 : Invalid input! \n";
                    } 
                }
                break;
            case "FORWARD": 
                $bike->forward();
                break;
            case "TURN_LEFT": 
                $bike->turn('LEFT');
                break;
            case "TURN_RIGHT": 
                $bike->turn('RIGHT');
                break;
            case "GPS_REPORT": 
                $bike->gpsReport();
                break;
            default: 
                echo "ERROR 1003: Invalid input! \n";
                break;
        }
    }
 
}
 