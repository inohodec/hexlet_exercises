<?php

/**
 * find common divider and optimize rationals
 */

namespace Ostepan\Lib\Rational;

class NormalizatorOfRationals implements NormalizatorInterface
{
    public function normalize(RationalInterface $rational): RationalInterface
    {
        if ($rational->getNumer() === 1 || $rational->getDenom() === 1) {

            return $rational;
            
        } else {

            $allDividers = $this->calculateDividers($rational->getNumer(), $rational->getDenom());
            $maxDevider = $this->selectMaxCommonDeviders($allDividers);
            $normalizedNumer = $rational->getNumer() / $maxDevider;
            $normalizedDenom = $rational->getDenom() / $maxDevider;
            
            return new RationalNumber($normalizedNumer, $normalizedDenom);
        }
    }
    //calculate all deviders for number(at least 1 ant the same number)
    public function calculateDividers(int ...$numbers): array
    {
        foreach ($numbers as $value) {
            for ($i = 1; $i <= $value; $i++) {
                if ($value % $i === 0) {
                    $deviders[] = $i;
                }
            }
        }
        return $deviders;
    }

    private function selectMaxCommonDeviders(array $deviders): int
    {
        $commonDividers =  array_filter(
            array_count_values($deviders), fn($value) => $value > 1
        );
        $uniqCommonDeviders = array_keys($commonDividers);
        return array_pop($uniqCommonDeviders);
    }

    
}
