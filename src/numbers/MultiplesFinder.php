<?php

namespace exer\numbers;

/**
 * @category Числа
 * @description Ищет кратные числа
 */
class MultiplesFinder
{
    private $multiples = [3, 5];

    /** @var ListOfNumbers */
    private $listNumbers;

    public function __construct(ListOfNumbers $listNumbers)
    {
        $this->listNumbers = $listNumbers;
    }

    public function find(): ListOfNumbers
    {
        $listOfMultiples = new ListOfNumbers();
        foreach ($this->listNumbers->iterator() as $number) {
            foreach ($this->multiples as $multiple) {
                if (
                    $this->isDivisible($number, $multiple) &&
                    !$this->isDuplicated($number, $listOfMultiples)
                ) {
                    $listOfMultiples->add($number);
                }
            }
        }

        return $listOfMultiples;
    }

    private function isDuplicated(Number $number, ListOfNumbers $listOfNumbers)
    {
        foreach ($listOfNumbers->iterator() as $possibleDouble) {
            if ($possibleDouble->value === $number->value) {
                return true;
            }
        }

        return false;
    }

    private function isDivisible(Number $number, int $toNumber): bool
    {
        return $number->value % $toNumber === 0;
    }
}