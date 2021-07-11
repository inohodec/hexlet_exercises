<?php

/*
* Находит среднюю точку отрезка
* Средняя точка вычисляется по формуле x = (x1 + x2) / 2 и y = (y1 + y2) / 2.
*/

//проверяет существование точек a, b и кординат [x,y]
function checkCordinatesExistance(array $cordinates): bool
{
    //проверяем существование точек a, b
    $existance[] = isset($cordinates['a']);
    $existance[] = isset($cordinates['b']);
    
    //проверяем существование кординат [x,y] у точек a, b
    $existance[] = isset($cordinates['a']['x']);
    $existance[] = isset($cordinates['a']['y']);
    $existance[] = isset($cordinates['b']['x']);
    $existance[] = isset($cordinates['b']['y']);
    
    foreach ($existance as $value) {
        if ($value === false) {
            return false;
        }
    }
    return true;
}

// проверяет являюься ли координаты целыми числами
function checkCordinatesValue(array $cordinates): bool
{
    $isInteger[] = is_int($cordinates['a']['x']);
    $isInteger[] = is_int($cordinates['a']['y']);
    $isInteger[] = is_int($cordinates['b']['x']);
    $isInteger[] = is_int($cordinates['b']['y']);

    foreach ($isInteger as $value) {
        if ($value === false) {
            return false;
        }
    }
    return true;
}

//проверяет совпадение координат двух точек
function checkEquality(array $coordinates): bool
{
    return $coordinates['a'] !== $coordinates['b'];
}

function getMidpoint(array $cordinates)
{
    if (checkCordinatesExistance($cordinates)) {
        if (checkCordinatesValue($cordinates)) {
            if (checkEquality($cordinates)) {
                $x = ($cordinates['a']['x'] + $cordinates['b']['x']) / 2;
                $y = ($cordinates['a']['y'] + $cordinates['b']['y']) / 2;
                return ['x' => $x, 'y' => $y];
            }
        }
    }
    return false;
}
$point1 = ['x' => 4, 'y' => 0];
$point2 = ['x' => 4, 'y' => 4];

$cordinates = ['a' => $point1, 'b' => $point2];

$point3 = getMidpoint($cordinates);
print_r($point3);                           // => [ 'x' => 2, 'y' => 2 ]
