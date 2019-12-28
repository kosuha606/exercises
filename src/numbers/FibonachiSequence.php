<?php

namespace exer\numbers;

/**
 * @category Числа
 * @description Построение последовательности фибоначи по пределу
 */
class FibonachiSequence
{
    private $limit;

    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    public function build(): ListOfNumbers
    {
        $fibonachiList = new ListOfNumbers();
        $firstNumber = 0;
        $secondNumber = 1;
        while (true) {
            $tempNumber = $firstNumber;
            $firstNumber = $secondNumber;
            $secondNumber = $tempNumber + $secondNumber;
            if ($secondNumber > $this->limit) {
                break;
            }
            $fibonachiList->add(new Number($secondNumber));
        }

        return $fibonachiList;
    }
}