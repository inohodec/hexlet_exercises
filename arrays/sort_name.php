<?php

/**
 * Реализуйте функцию getSortedNames, которая принимает на вход список пользователей,
 * извлекает их имена, сортирует и возвращает отсортированный список имен.
 */

function getSortedNames(array $person): array
{           
    foreach ($person as ['name' => $name]) {
        $names[] = $name;
    }

    sort($names);
    return $person;
}

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03']
];

getSortedNames($users);

