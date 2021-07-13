<?php

require_once "vendor/autoload.php";

use Ostepan\Lib\Rational\{RationalNumber, RationalCalculator};

$num1 = new RationalNumber(2, 5);
$num2 = new RationalNumber(3, 7);

$calc = new RationalCalculator($num1, $num2);

$sum = $calc->add();

echo $sum->getHumanRational() . PHP_EOL;
