<?php

declare(strict_types=1);

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\Rational\RationalNumber;

class Substract extends CalcActions
{
    public function calculate(): RationalNumber
    {
        if ($this->denom1 === $this->denom2) {
            $newNumer = $this->numer1 - $this->numer2;
            $result = new RationalNumber("{$newNumer}/{$this->denom2}");
            return $this->normalizer->normalize($result);
        } else {
            $NOK = $this->getNOK();     //*Наименьшее общее кратное
            $additionalMultiplicatorOne = $NOK / $this->denomOne;   //*Доп множитель для 1ой дроби
            $additionalMultiplicatorTwo = $NOK / $this->denomTwo;   //*Доп множитель для 2ой дроби
            //*перемножаем делимое на доп.множители
            $newNumerOne = $this->numerOne * $additionalMultiplicatorOne;
            $newNumerTwo = $this->numerTwo * $additionalMultiplicatorTwo;
            //*слаживаем делители
            $newNumer = $newNumerOne - $newNumerTwo;
            //*получаем и нормализуем новую дробь
            $result = new RationalNumber("{$newNumer}/{$NOK}");
            //*нормализуем результат
            return $this->normalizer->normalize($result);
        }
    }
}
