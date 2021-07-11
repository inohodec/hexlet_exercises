<?php

declare(strict_types=1);

use Ostepan\Lib\Rational\NormalizatorOfRationals;
use Ostepan\Lib\Rational\RationalNumber;

require "../vendor/autoload.php";

   $real1 = new RationalNumber(2, 5);
   $real2 = new RationalNumber(2, 10);
    $norm = new NormalizatorOfRationals();
$newReal1 = $norm->normalize($real1);
echo $newReal1->getHumanRational() . PHP_EOL;
$newReal2 = $norm->normalize($real2);
echo $newReal2->getHumanRational() . PHP_EOL;
$deviders = $norm->calculateDividers(2, 5, 10);
echo PHP_EOL;
