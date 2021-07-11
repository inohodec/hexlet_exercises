<?php

/**
 * озвращает среднее арифметическое всех переданных аргументов.
 * Если функции не передать ни одного аргумента, то она должна вернуть null.
 */

function Average(...$numbers)
{
    if (count($numbers) === 0) {
        return null;
    } else {
        $sum = array_sum($numbers);

        if ($sum === 0) {
            return 0;
        } else {
            return array_sum($numbers) / count($numbers);
        }
    }
}

$average1 = average(0); // 0
$average2 = average(0, 10); // 5
$average3 = average(-3, 4, 2, 10); // 3.25
$average4 = average(); // null
