<?php

/**
 * Алгоритм
 * Поиск пересечения двух неотсортированных массивов — операция,
 * в рамках которой выполняется вложенный цикл с полной проверкой
 * каждого элемента первого массива на вхождение во второй.
 * Сложность данного алгоритма O(n * m) (произведение n и m),
 * где n и m — размерности массивов. Если массивы отсортированы,
 * то можно реализовать алгоритм, сложность которого уже O(n + m),
 * что значительно лучше.
 * Суть алгоритма довольно проста. В коде вводятся два указателя (индекса)
 * на каждый из массивов. Начальное значение каждого указателя 0.
 * Затем идёт проверка элементов, находящихся под этими индексами в обоих массивах.
 * Если они совпадают, то значение заносится в результирующий массив,
 * а оба индекса инкрементируются. Если значение в первом массиве больше,
 * чем во втором, то инкрементируется указатель второго массива, иначе — первого.
 */

function getIntersection(array $arr1, array $arr2)
{
        $result = [];
    foreach ($arr1 as $arr1_val) {
        foreach ($arr2 as $arr2_val) {
            if ($arr1_val === $arr2_val) {
                $result[] = $arr1_val;
            }
        }
    }
    return $result;
}

function getIntersectionSorted(array $arr1, array $arr2)
{
    $intersected = [];
    
    $arr1Length = count($arr1);
    $arr2Length = count($arr2);

    $arr1Index = 0;
    $arr2Index = 0;

    if ($arr1Length == 0 || $arr2Length == 0) {
        return $intersected;
    }

    $continue = true;

    while ($continue) {
        if ($arr1[$arr1Index] === $arr2[$arr2Index]) {
            $intersected[] = $arr1[$arr1Index];
            $arr1Index++;
            $arr2Index++;
        } elseif ($arr1[$arr1Index] > $arr2[$arr2Index]) {
            $arr2Index++;
        } else {
            $arr1Index++;
        }

        if ($arr1Index == $arr1Length || $arr2Index == $arr2Length) {
            $continue = false;
        }
    }

    return $intersected;
}


var_dump(getIntersection([10, 11, 24], [10, 13, 14, 18, 24, 30]));
var_dump(getIntersection([10, 11, 24], [-2, 3, 4]));
var_dump(getIntersection([], [2]));

echo PHP_EOL . "**************************************" . PHP_EOL;

var_dump(getIntersectionSorted([10, 11, 24], [10, 13, 14, 18, 24, 30]));
var_dump(getIntersectionSorted([10, 11, 24], [-2, 3, 4]));
var_dump(getIntersectionSorted([], [2]));
