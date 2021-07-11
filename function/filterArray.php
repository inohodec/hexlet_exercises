<?php

require_once __DIR__ . "/../vendor/autoload.php";

function getGirlFriends(array $users): array
{
    $friends = array_column($users, 'friends');
    $friends = \Funct\Collection\flatten($friends);
    $onlyGirls = array_filter($friends, fn($friend) => $friend['gender'] === "female");
    return $onlyGirls;
}

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

$girls = getGirlFriends($users);
print_r($girls);
