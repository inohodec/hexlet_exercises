<?php

function makeDecartPoint(int $x, int $y) {
    return [
        "x" => $x,
        "y" => $y
    ];
}
//build rectangle from cordinates of left top point witht width and height
//and retutn coordinates
function makeRectangle(array $cordinates, int $width, int $height): array
{
    if (isRightData($cordinates, $width, $height)) {
        $leftTop = $cordinates;
    
        $rightTop = [
            "x" => $cordinates['x'] + $width,
            "y" => $cordinates['y']
        ];

        $leftBottom = [
            "x" => $cordinates['x'],
            "y" => $cordinates['y'] - $height
        ];

        $rightBottom = [
            "x" => $cordinates['x'] - $height,
            "y" => $cordinates['y'] + $width
        ];

        return [
            "lt" => $leftTop,
            "rt" => $rightTop,
            "lb" => $leftBottom,
            "rb" => $rightBottom
        ];
    }
    return false;
}

function getStartPoint(array $rectangle): array
{
    return $rectangle["lt"];
}

function getWidth(array $rectangle): int
{
    $result = $rectangle["rt"]["x"] - $rectangle["lt"]["x"];
    return (int) $result;
}

function getHeight(array $rectangle): int
{
    $result = $rectangle["lt"]["y"] - $rectangle["lb"]["y"];
    return (int) $result;
}

//check if width and height > 0
function isRightData(array $cordinates, int $width, int $height): bool
{
    if (empty($cordinates["x"]) && empty($cordinates["y"])) {
        return false;
    }

    if ($width < 0 || $height < 0) {
        return false;
    }
    return true;
}

//if centre of cordinates inside the rectangle leftTop point and rightBottom point are
//lying outside x>0 & y<0 and x>0 & y<0
function containsOrigin(array $rectangle): bool
{

    $lt = getStartPoint($rectangle);
    $rb["x"] = $lt["x"] + getWidth($rectangle);
    $rb["y"] = $lt["y"] - getHeight($rectangle);
    
    if ($lt["x"] < 0 && $lt["y"] > 0) {
        if ($rb["x"] > 0 && $rb["y"] < 0) {
            return true;
        }
    }
    return false;
}

$p = makeDecartPoint(0, 1);
$rectangle = makeRectangle($p, 4, 5);

$a = containsOrigin($rectangle); // false

$rectangle2 = makeRectangle(makeDecartPoint(-4, 3), 5, 4);
$b = containsOrigin($rectangle2); // true
echo PHP_EOL . "";
