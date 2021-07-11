<?php

/**
 * union(...$arrays), которая находит объединение всех переданных массивов.
 * Функция принимает на вход от одного массива и больше. Ключи исходных массивов не сохраняются
 * (т.е. все значения итогового массива заново индексируются: 0, 1, 2, ...).
 */
function union(...$arrays)          //
{
    $arr = array_merge(...$arrays);
    $newArr = array_unique($arr);
    return $newArr;
}

$val1 = union([3]); // [3]
$val2 = union([3, 2], [2, 2, 1]); // [3, 2, 1]
$val3 = union(['a', 3, false], [true, false, 3], [false, 5, 8]); // ['a', 3, false, true, 5, 8]

