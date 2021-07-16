<?php

/**
 * Describes rational number
 * php version 7.4
 */

declare(strict_types=1);

namespace Ostepan\Lib\Rational;

// use Ostepan\Lib\Rational\RationalInterface as RationalInterface;

class RationalNumber implements RationalInterface
{
    private $numer;
    private $denom;
    private bool $status = true;
    public function __construct(string $rational)
    {
        $values = $this->dispatchString($rational);
        $this->setValues($values);
    }
    /**
     * *setValues
     * *Проверяет соответствует ли переданные числа реальному числу
     * *т.е. числитель и знаменатель не должны быть равны 0
     * *если условия не соблюдены возвращает ЛОЖЬ и создаёт дробь 1/1
     *
     * @return bool
     */
    protected function setValues(array $values): bool
    {
        if ($values['numer'] === 0 || $values['denom'] === 0) {
            $this->numer = 1;
            $this->denom = 1;
            return false;
        } else {
            $this->numer = $values['numer'];
            $this->denom = $values['denom'];
            return true;
        }
    }

    protected function dispatchString(string $str): array
    {
        $values = explode("/", $str);
        $numer = (int) $values[0];
        $denom = (int) $values[1];
        $val['numer'] = $numer;
        $val['denom'] = $denom;
        return $val;
    }

    /**
     * *set Sign of rational number
     *
     * @param  mixed $sign
     * @return void
     */
    public function setSign(string $sign = "+"): void
    {
        if ($sign === "-" && $this->numer > 0) {
            $this->numer *= -1;
        } elseif ($sign === "") {
        }
    }

    /**
     * getNumer
     *
     * @return int
     */
    public function getNumer(): int
    {
        return $this->numer;
    }

    /**
     * getDenom
     *
     * @return int
     */
    public function getDenom(): int
    {
        return $this->denom;
    }

    /**
     * *getHumanRational
     * *return real number in human view ex: 3/5 ок 2(3/5)
     *
     * @return string
     */

    
    public function getHumanRational(): string
    {
        if (abs($this->numer) > $this->denom) {
            $wholePart = intval($this->numer / $this->denom);
            $newNumer = abs($this->numer) - abs($wholePart) * $this->denom;
            if ($newNumer === 0) {
                return "real numer is a whole number: {$wholePart}," .
                " or in real view: {$this->numer}/{$this->denom}";
            } else {
                return "{$wholePart}({$newNumer}/{$this->denom})";
            }
        } else {
            return "{$this->numer}/{$this->denom}";
        }
    }

    /**
     * 
     *
     * @param  bool  $status
     *
     * @return  self
     */
    public function setStatus(bool $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return  bool
     */
    public function getStatus()
    {
        return $this->status;
    }
}
