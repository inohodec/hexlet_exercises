<?php

require_once __DIR__ . "/../vendor/autoload.php";

$users = [
    ['name' => 'Tirion', 'children' => [
        ['name' => 'Mira', 'birdhday' => '1983-03-23']
    ]],
    ['name' => 'Bronn', 'children' => []],
    ['name' => 'Sam', 'children' => [
        ['name' => 'Aria', 'birdhday' => '2012-11-03'],
        ['name' => 'Keit', 'birdhday' => '1933-05-14']
    ]],
    ['name' => 'Rob', 'children' => [
        ['name' => 'Tisha', 'birdhday' => '2012-11-03']
    ]],
];

function getChildren(array $users): array
{
    $children = array_column($users, 'children');
    $children = \Funct\Collection\flatten($children);
    return $children;
}
$children = getChildren($users);
var_dump($children);
