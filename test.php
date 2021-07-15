<?php

require_once "vendor/autoload.php";

use Ostepan\Lib\Rational\{RationalNumber, RationalCalculator};

$num1 = new RationalNumber("12/5");
$num2 = new RationalNumber("22/5");

$calc = new RationalCalculator($num1, $num2);

$sum = $calc->add();
// $sum1 = $calc->substract();
// $sum2 = $calc->multiply();
// $sum3 = $calc->split();

echo "+ :" . $sum->getHumanRational() . PHP_EOL;
// echo "- :" . $sum1->getHumanRational() . PHP_EOL;
// echo "* :" . $sum2->getHumanRational() . PHP_EOL;
// echo "/ :" . $sum3->getHumanRational() . PHP_EOL;
