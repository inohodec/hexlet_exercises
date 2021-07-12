<?php

namespace Ostepan\Lib\Rational;

class RationalCalculator implements CalculatorInterface
{
    private int $numerOne;
    private int $denomOne;
    private int $numerTwo;
    private int $denomTwo;
    public NormalizatorOfRationals $normalizer;


    public function __construct(RationalNumber $num1, RationalNumber $num2)
    {
        $this->numerOne = $num1->getNumer();
        $this->numerTwo = $num2->getNumer();
        $this->denomOne = $num1->getDenom();
        $this->denomTwo = $num2->getDenom();
        $this->normalizer = new NormalizatorOfRationals();
    }


    /**
     * add
     *
     * @return RationalNumber
     */
    public function add(): RationalNumber
    {
        if ($this->denomOne === $this->denomTwo) {
            $newNumer = $this->numerOne + $this->numerTwo;
            $result =  new RationalNumber($newNumer, $this->denomOne);
            return $this->normalizer->normalize($result);
        } else {
            $commonDenoms = $this->normalizer->calculateDividers($this->denomOne, $this->denomTwo);
            $nok = 1;       //наименьшее общее кратное(вычисляется произведением общих делителей)

            //TODO: вынести в отдельный метод
            foreach ($commonDenoms as $value) {
                $nok *= $value;
            }

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
            return $this->normalizer->normalize($result);
        }
    }

    public function substract()
    {
        return new RationalNumber(1, 1);
    }

    public function multiply()
    {
        return new RationalNumber(1, 1);
    }

    public function split()
    {
        return new RationalNumber(1, 1);
    }
}
