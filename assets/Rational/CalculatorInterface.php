<?php

namespace Ostepan\Lib\Rational;

use Ostepan\Lib\Rational\RationalInterface;

interface CalculatorInterface
{
    public function add();
    public function substract();
    public function multiply();
    public function split();
}