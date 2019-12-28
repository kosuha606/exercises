<?php

namespace exer\numbers;

/**
 * @category Числа
 * @description Сумма только четных чисел в списке
 */
class EvenNumbersSum extends NumbersSum
{
    public function __construct(ListOfNumbers $listOfNumbers)
    {
        $sum = 0;
        foreach ($listOfNumbers->iterator() as $number) {
            if ($number->value % 2 === 0) {
                $sum += $number->value;
            }
        }
        $this->sum = $sum;
    }
}