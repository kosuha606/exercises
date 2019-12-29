<?php

namespace exer\numbers;

use exer\numbers\Number;

class PrimeFactorsFinder
{
    /**
     * @var Number
     */
    private $forNumber;

    public function __construct(Number $forNumber)
    {
        $this->forNumber = $forNumber;
    }

    public function find(): ListOfNumbers
    {
        $primeList = new ListOfNumbers();
        for ($i=2; $i<$this->forNumber->value;$i++) {
            $isDivisibleOnOtherPrimes = false;
            /** @var Number $prime */
            foreach ($primeList->getList() as $prime) {
                if (
                    $prime->value !== $i &&
                    $prime->value % $i === 0
                ) {
                    $isDivisibleOnOtherPrimes = true;
                }
            }
            // Простое число не должно делиться на другие простые числа
            if (
                $this->forNumber->value % $i === 0 &&
                !$isDivisibleOnOtherPrimes
            ) {
                $number = new Number($i);
                if ($number->isPrime()) {
                    print("Find number: {$number->value} \n");
                    $primeList->add($number);
                }
            }
        }

        return $primeList;
    }
}