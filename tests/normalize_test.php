<?php

require "../vendor/autoload.php";

$a = new \Ostepan\Lib\Normalizator(2, 6);

$normaized = $a->getNormalized();

var_dump($normaized);
