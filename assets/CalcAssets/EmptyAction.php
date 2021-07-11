<?php

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\Rational\RationalNumber;

class EmptyAction extends CalcActions
{
    private $status = false;
    public function calculate():  RationalNumber
    {
        return new RationalNumber(0, 0);
    }
}
