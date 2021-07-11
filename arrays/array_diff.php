<?php

/**
 * Реализуйте функцию genDiff, которая сравнивает два ассоциативных массива и возвращает результат сравнения в виде
 * ассоциативного массива. Ключами результирующего массива будут все ключи из двух входящих массивов,
 * а значением строка с описанием отличий => added, deleted, changed или unchanged.
 * Возможные значения:
 * added    — ключ отсутствовал в первом массиве, но был добавлен во второй
 * deleted  — ключ был в первом массиве, но отсутствует во втором
 * changed  — ключ присутствовал и в первом и во втором массиве, но значения отличаются
 * unchanged — ключ присутствовал и в первом и во втором массиве с одинаковыми значениями
 */

function genDiff(array $arr1, array $arr2): array
{
    $arrayDiff = [];
    foreach ($arr1 as $key => $value) {
        if (array_key_exists($key, $arr2)) {
            $result = $arr2[$key] === $arr1[$key];
            $arrayDiff[$key] = $result ? "unchanged" : "changed";
        } else {
            $arrayDiff[$key] = "deleted";
        }
    }

    foreach ($arr2 as $key => $value) {
        if (!array_key_exists($key, $arr1)) {
            $arrayDiff[$key] = "added";
        }
    }

    return $arrayDiff;
}

$result = genDiff(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
);

echo "<ul>";
foreach ($result as $key => $value) {
    echo "<li>'$key' => '$value'</li>";
}
echo "</ul>";
