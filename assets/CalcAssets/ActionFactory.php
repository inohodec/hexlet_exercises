<?php

namespace Ostepan\Lib\CalcAssets;

use Ostepan\Lib\CalcAssets\CalcActions;
use Ostepan\Lib\Rational\RationalInterface;

class ActionFactory
{
    /**
     * Выбираем экземпляр нужного класса, кот зависит от знака введенного в калькулятор
     */
    public function getAction(
        string $actionType,
        RationalInterface $rational1,
        RationalInterface $rational2
    ): CalcActions {
        if ($actionType === "+") {
            return new Add($rational1, $rational2);
        } elseif ($actionType === "-") {
            return new Substract($rational1, $rational2);
        } elseif ($actionType === "*") {
            return new Multiply($rational1, $rational2);
        } elseif ($actionType === "/") {
            return new Divide($rational1, $rational2);
        } else {
            return new EmptyAction($rational1, $rational2);
        }
    }
}
