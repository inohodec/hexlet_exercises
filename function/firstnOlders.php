<?php

require_once __DIR__ . "/../vendor/autoload.php";

$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27']
];

function takeOldest(array $users, $amount = 1): array
{
    $algo = fn($a, $b) => $b['birthday'] <=> $a['birthday'];
    $sortedUsers = usort($users, $algo);
    return Funct\Collection\firstN($users, $amount);
}

$oldest = takeOldest($users, 2);
echo PHP_OS;
