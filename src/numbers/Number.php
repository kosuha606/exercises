<?php

namespace exer\numbers;

/**
 * @category Числа
 * @description Представление одного числа
 */
class Number
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Определяем что число простое
     * @return bool
     */
    public function isPrime()
    {
        $condition = sqrt($this->value)+1;
        for ($i=2; $i<$condition; $i++) {
            if ($this->value % $i === 0) {
                return false;
            }
        }

        return true;
    }

    public function __toString()
    {
        return (string)$this->value;
    }
}