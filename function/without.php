<?php

function without(array $arr, ...$arguments)
{
    $result = [];
    foreach ($arr as $value) {
        $include = true;
        foreach ($arguments as $argument) {
            if ($argument === $value) {
                $include = false;
            }
        }
        if ($include) {
            $result[] = $value;
        }
    }
    return $result;
}

function without_(array $items, ...$values)
{
    $filtered = array_filter($items, function ($item) use ($values) {
        foreach ($values as $value) {
            if ($value === $item) {
                return false;
            }
        }
        return true;
    });
    // Сбрасываем ключи
    return array_values($filtered);
}



$a = without([3, 4, 10, 4, 'true'], 4); // [3, 10, 'true']
$b = without(['3', 2], 0, 5, 11); // ['3', 2]
echo " ";
$a = without_([3, 4, 10, 4, 'true'], 4, 10); // [3, 10, 'true']
$b = without(['3', 2], 0, 5, 11); // ['3', 2]
echo " ";
