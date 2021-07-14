<?php

require_once "vendor/autoload.php";

use Ostepan\Lib\Rational\{RationalNumber, RationalCalculator};

$num1 = new RationalNumber("12/5");
$num2 = new RationalNumber("2/5");

$calc = new RationalCalculator($num1, $num2);

$sum = $calc->add();

echo $num1->getHumanRational() . PHP_EOL;
