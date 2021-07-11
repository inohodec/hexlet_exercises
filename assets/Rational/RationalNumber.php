<?php

/**
*
*/

namespace Ostepan\Lib\Rational;

class RationalNumber implements RationalInterface
{
    private $numer;
    private $denom;
    
    public function __construct(int $numer, int $denom)
    {
        $this->numer = $numer;
        $this->denom = $denom;
    }

    public function getNumer(): int
    {
        return $this->numer;
    }

    public function getDenom(): int
    {
        return $this->denom;
    }

    public function getHumanRational(): string
    {
        return "{$this->numer}/{$this->denom}";
    }
}
