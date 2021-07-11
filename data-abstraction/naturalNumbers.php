<?php

require_once "../vendor/autoload.php";

$real = new \Ostepan\Lib\Rational\RationalNumber(6, 8);
$real1 = new \Ostepan\Lib\Rational\RationalNumber(10, 10);
var_dump($real);
var_dump($real1);
echo $real->getHumanRational();
echo PHP_EOL;
