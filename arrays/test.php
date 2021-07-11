<?php

require_once __DIR__ . "/../vendor/autoload.php";

$array = ['', null, 'foo_bar'];

$result = Funct\firstValueNotEmpty(...$array);
echo $result;
