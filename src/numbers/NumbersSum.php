<?php

namespace exer\numbers;

/**
 * @category Числа
 * @description Суммирует числа из ListOfNumbers
 */
class NumbersSum
{
    private $sum;

    public function __construct(ListOfNumbers $listOfNumbers)
    {
        $sum = 0;
        foreach ($listOfNumbers->iterator() as $number) {
            $sum += $number->value;
        }
        $this->sum = $sum;
    }

    public function __toString()
    {
        return "Sum is $this->sum";
    }
}