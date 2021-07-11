<?php

require_once "vendor/autoload.php";

$num1 = new \Ostepan\Lib\Rational\RationalNumber(2, 5);
$num2 = new \Ostepan\Lib\Rational\RationalNumber(3,7);

$calc = new \Ostepan\Lib\Rational\RationalCalculator($num1, $num2);

$sum = $calc->add();

echo $sum->getHumanRational();

echo "Test for commit";

echo "Test for commit again";
