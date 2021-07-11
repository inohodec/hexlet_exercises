<?php

namespace Ostepan\Lib\Rational;

use Ostepan\Lib\CalcAssets\ActionFactory;

class NewRationalCalculator implements CalculatorInterface
{
    public NormalizatorOfRationals $normalizer;
    private ActionFactory $actionFactory;
    private $rational1;
    private $rational2;
    

    public function __construct(RationalNumber $real1, RationalNumber $real2)
    {
        $this->normalizer = new NormalizatorOfRationals();
        $this->actionFactory = new ActionFactory($real1, $real2);
        $this->rational1 = $real1;
        $this->rational2 = $real2;
    
    }

    public function doAction(string $actionType  = "+")
    {
        $action = $this->actionFactory->getAction($actionType, );
        $result = $action->calculate();
        echo $result->getHumanRational() . PHP_EOL;
    }
    
    
    
    public function add() 
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
