<?php

function calculateDistance(array $point1, array $point2)
{
    if (count($point1) === 3 && count($point2) === 3) {
        [$x1, $y1, $z1] = $point1;
        [$x2, $y2, $z2] = $point2;
    } elseif (count($point1) === 2 && count($point2) === 2) {
        [$x1, $y1] = $point1;
        [$x2, $y2] = $point2;
        $z1 = $z2 = 0;
    } else {
        return false;
    }
    
    $distance = sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2) + pow(($z2 - $z1), 2));
    return $distance;
}

$point1 = [0, 0, 1];
$point2 = [3, 4, 1];

echo calculateDistance($point1, $point2);
