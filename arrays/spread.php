<?php

/**
 * выравнивает массив
 */

function flatten(array $numbers): array
{
    if (empty($numbers)) {
        return $numbers;
    }

    $result = [];
    for ($i = 0; $i < count($numbers); $i++) {
        if (!is_array($numbers[$i])) {
            $result[] = $numbers[$i];
        } else {
            $innerArray = $numbers[$i];
            array_push($result, ...$innerArray);
        }
    }

    return $result;
}

$a = flatten([]);                       // []
$c = flatten([1, [3, 2], 9]);           // [1, 3, 2, 9]
$d = flatten([1, [[2], [3]], [9]]);     // [1, [2], [3], 9]
echo "";
