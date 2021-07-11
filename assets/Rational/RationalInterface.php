<?php

/**
 * определяет методы рационального числа(дроби)
*/

namespace Ostepan\Lib\Rational;

interface RationalInterface
{
    public function getHumanRational(): string;
    public function getNumer(): int;
    public function getDenom(): int;
}
