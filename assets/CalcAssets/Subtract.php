<?php

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\Rational\RationalNumber;

class Substract extends CalcActions
{
    public function calculate():  RationalNumber
    {
        return new RationalNumber(1, 1);
    }
}