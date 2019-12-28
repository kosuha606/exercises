<?php

namespace exer\numbers;

/**
 * @category Числа
 * @description Генерирует последовательный ряд натуральных чисел от 1 до $limit
 */
class OrderListGenerator
{
    private $limit;

    public function __construct($limit = 10)
    {
        $this->limit = $limit;
    }

    public function build(): ListOfNumbers
    {
        $list = new ListOfNumbers();
        for ($i=1; $i< $this->limit;$i++) {
            $list->add(new Number($i));
        }

        return $list;
    }
}