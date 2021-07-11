<?php

declare(strict_types=1);

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\Rational\RationalNumber;

class Multiply extends CalcActions
{
    public function calculate() : RationalNumber
    {
        return new RationalNumber(1, 1);
    }
}
