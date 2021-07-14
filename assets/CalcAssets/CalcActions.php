<?php

declare(strict_types=1);

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\Rational\{RationalInterface, RationalNumber};
use Ostepan\Lib\Rational\NormalizatorOfRationals;

abstract class CalcActions
{
    /**
     * *If action is correct value of @status = true,
     * *in any else situation @status = false
     */
    protected NormalizatorOfRationals $normalizer;
    protected $status = true;
    protected int $numer1;
    protected int $numer2;
    protected int $denom1;
    protected int $denom2;

    public function __construct(RationalInterface $real1, RationalInterface $real2)
    {
        $this->normalizer = new NormalizatorOfRationals();
            $this->numer1 = $real1->getNumer();
            $this->numer2 = $real2->getNumer();
            $this->denom1 = $real1->getDenom();
            $this->denom2 = $real2->getDenom();
    }

    abstract public function calculate(): RationalNumber;

    /**
     * @return status
     */
    public function getStatus()
    {
        return $this->status;
    }

    protected function getNOK(): int
    {
        $allDividers = $this->normalizer->calculateDividers(
            $this->denom1,
            $this->denom2
        );
                $nok = 1;
        foreach ($allDividers as $divider) {
            $nok *= $divider;
        }
        return $nok;
    }
}
