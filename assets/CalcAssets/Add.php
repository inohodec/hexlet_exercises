<?php

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\Rational\RationalNumber;

class Add extends CalcActions
{
    public function calculate(): RationalNumber
    {
        if ($this->denom1 === $this->denom2) {
            $newNumer = $this->numer1 + $this->numer2;
            $result =  new RationalNumber($newNumer, $this->denom1);
            return $this->normalizer->normalize($result);
        } else {
            $allDividers = $this->normalizer->calculateDividers($this->denom1, $this->denom2);
            
            //наименьшее общее кратное(вычисляется произведением общих делителей)
            $nok = $this->getNOK();
            
            
            //получаем доп. множетели для каждлой дроби
            $additionalMultiplicatorOne = $nok / $this->denomOne;
            $additionalMultiplicatorTwo = $nok / $this->denomTwo;
            
            //перемножаем делимое на доп.множители
            $newNumerOne = $this->numerOne * $additionalMultiplicatorOne;
            $newNumerTwo = $this->numerTwo * $additionalMultiplicatorTwo;
            
            //слаживаем делители
            $newNumer = $newNumerOne + $newNumerTwo;
            
            //получаем и нормализуем новую дробь
            $result = new RationalNumber($newNumer, $nok);
            
            //нормализуем результат
            return $this->normalizer->normalize($result);
        }
    }

    
}