# Bike Simulator

An PHP application simulating a bike driving on a 7 x 7 grid

## Description

The bike is free to move around the grid but must be prevented from exiting the grid

## Executing program

### Start app

```
php index.php
```

### Supported commands (all commands are case insensitive)

```
Enter your operation: PLACE 3,4,NORTH
Enter your operation: gps_report
(3, 4), NORTH
Enter your operation: forward
Enter your operation: gps_report
(3, 5), NORTH
Enter your operation: TuRn_LefT
Enter your operation: FORward
Enter your operation: turn_right
Enter your operation: gps_report
(2, 5), NORTH
Enter your operation: place 0,0,west
Enter your operation: exit
```