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
                $allDividers = $this->calculateDividers(
                    $rational->getNumer(),
                    $rational->getDenom()
                );
                  $commonDeviders = $this->selectCommonDeviders($allDividers);
            $highestCommonDevider = $this->selectHighestValue($commonDeviders);
                 $normalizedNumer = $rational->getNumer() / $highestCommonDevider;
                 $normalizedDenom = $rational->getDenom() / $highestCommonDevider;
            return new RationalNumber("{$normalizedNumer}/{$normalizedDenom}");
        }
    }

    /**
     * calculateDividers
     * * calculate deviders for all values from parametera
     * * for example 4,6 = 1, 2, 4, 1, 3, 5
     * * используем модуль числа abs($value) на случай если значение будет ниже нуля,
     * * соответственно если не взять положительное число, тогда цикл не отработает
     *
     * @param  mixed $numbers
     * @return array
     */
    public function calculateDividers(int ...$numbers): array
    {
        foreach ($numbers as $value) {
            for ($i = 1; $i <= abs($value); $i++) {
                if ($value % $i === 0) {
                    $deviders[] = $i;
                }
            }
        }
        return $deviders;
    }

    /**
     * selectMaxCommonDeviders
     * *select the most higher value from array
     *
     * @param  mixed $dividers
     * @return array of int
     */
    protected function selectCommonDeviders(array $dividers): array
    {
        $countedUniqValues = array_count_values($dividers);
        $commonDividers = array_filter(
            $countedUniqValues,
            fn($value) => $value > 1
        );
        return array_keys($commonDividers);
    }

    /**
     * selectHighestValue
     * * get last element of sorted(ascending) array
     *
     * @param  mixed $values
     * @return int
     */
    protected function selectHighestValue(array $values): int
    {
        return array_pop($values);
    }
}
