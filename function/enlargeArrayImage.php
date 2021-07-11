<?php

require_once __DIR__ . "/../vendor/autoload.php";

function enlargeArrayImage(array $arr): array
{
    $duplicated = [];
    foreach ($arr as $row) {
        $duplicatedElements = duplicateArrayElements($row);
        array_push($duplicated, $duplicatedElements, $duplicatedElements);
    }
    return $duplicated;
}

function duplicateArrayElements(array $arr): array
{
    foreach ($arr as $value) {
        $result[] = $value;
        $result[] = $value;
    }
    return $result;
}

$image = [
    ['*','*','*','*'],
    ['*',' ',' ','*'],
    ['*',' ',' ','*'],
    ['*','*','*','*']
  ];

$duplicated = enlargeArrayImage($image);

$n = 1;
foreach ($duplicated as $row) {
    $strRow = implode("", $row);
    echo   $strRow . "\n\r";
}
