<?php

/**
* Interface for normalize two numbers(common divider)
*/

namespace Ostepan\Lib\Rational;

interface NormalizatorInterface
{
    public function normalize(RationalInterface $rational): RationalInterface;
}
