<?php

namespace Ostepan\Lib\Rational;

use Ostepan\Lib\CalcAssets\ActionFactory;

class RationalCalculator implements CalculatorInterface
{
    public NormalizatorOfRationals $normalizer;
    protected ActionFactory $actionFactory;
    protected RationalNumber $rational1;
    protected RationalNumber $rational2;

    public function __construct(RationalNumber $num1, RationalNumber $num2)
    {
        $this->normalizer = new NormalizatorOfRationals();
        $this->actionFactory = new ActionFactory();
        $this->rational1 = $num1;
        $this->rational2 = $num2;
    }


    /**
     * add
     *
     * @return RationalNumber
     */
    public function add(): RationalNumber
    {
        $action = $this->actionFactory->getAction("+", $this->rational1, $this->rational2);
        return $action->calculate();
    }

    /**
     * substract
     *
     * @return RationalNumber
     */
    public function substract(): RationalNumber
    {
        $action = $this->actionFactory->getAction("-", $this->rational1, $this->rational2);
        return $action->calculate();
    }

    /**
     * multiply
     *
     * @return RationalNumber
     */
    public function multiply(): RationalNumber
    {
        $action = $this->actionFactory->getAction("*", $this->rational1, $this->rational2);
        return $action->calculate();
    }

    /**
     * split
     *
     * @return RationalNumber
     */
    public function split(): RationalNumber
    {
        $action = $this->actionFactory->getAction("/", $this->rational1, $this->rational2);
        return $action->calculate();
    }
}
