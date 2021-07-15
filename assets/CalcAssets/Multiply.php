<?php

declare(strict_types=1);

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\Rational\RationalNumber;

class Multiply extends CalcActions
{
    public function calculate(): RationalNumber
    {
        $newNumer = $this->numer1 * $this->numer2;
        $newDenom = $this->denom1 * $this->denom2;
          $result = new RationalNumber("{$newNumer}/{$newDenom}");
        return $this->normalizer->normalize($result);
    }
}
