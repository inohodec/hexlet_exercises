<?php

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\Rational\RationalNumber;

class Divide extends CalcActions
{
    public function calculate(): RationalNumber
    {
        $newNumer = $this->numer1 * $this->denom2;
        $newDenom = $this->numer2 * $this->denom1;
          $result = new RationalNumber("{$newNumer}/{$newDenom}");
        return $result;
    }
}
