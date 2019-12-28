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

    public function __toString()
    {
        return $this->value;
    }
}