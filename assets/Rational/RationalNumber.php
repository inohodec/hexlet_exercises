<?php

/**
 * Describes rational number
 * php version 7.4
 */

declare(strict_types=1);

namespace Ostepan\Lib\Rational;

class RationalNumber implements RationalInterface
{
    private $numer;
    private $denom;
    private $sign;

    public function __construct(int $numer, int $denom, string $sign = "+")
    {
        $this->numer = $numer;
        $this->denom = $denom;
         $this->sign = $sign;
    }

    public function getNumer() : int
    {
        return $this->numer;
    }

    public function getDenom() : int
    {
        return $this->denom;
    }

    public function getHumanRational() : string
    {
        return "{$this->numer}/{$this->denom}";
    }

    /**
     * Set the value of sign
     */
    public function setSign(string $sign = "+") : void
    {
        if ($sign !== "+" || $sign !== "-") {
            $sign = "+";
        }
        $this->sign = $sign;
    }

    /**
     * Get the value of sign
     */
    public function getSign() : string
    {
        return $this->sign;
    }
}
