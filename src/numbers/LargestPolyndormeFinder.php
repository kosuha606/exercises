<?php

namespace exer\numbers;

use exer\numbers\Number;

class LargestPolyndormeFinder
{
    /**
     * @var int
     */
    private $digitsNumber;

    public function __construct($digitsNumber = 2)
    {
        $this->digitsNumber = $digitsNumber;
    }

    public function find(): Number
    {
        $number = new Number(1);
        $maxNumber = (int)str_pad(9, $this->digitsNumber, '9');

        for ($i = $maxNumber; $i > $maxNumber / 2; $i--) {
            for ($j = $maxNumber; $j > $maxNumber / 2; $j--) {
                if ($i === $j) {
                    continue;
                }
                $multiplication = $i * $j;
                $possiblePolyndrome = new Number($multiplication);
                if (
                    $possiblePolyndrome->isPolyndrome() &&
                    $possiblePolyndrome->value > $number->value
                ) {
                    $number = $possiblePolyndrome;
                }
            }
        }

        return $number;
    }
}