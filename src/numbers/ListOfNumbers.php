<?php

namespace exer\numbers;

/**
 * @category Числа
 * @description Список чисел Number
 */
class ListOfNumbers
{
    /** @var Number[] */
    private $list = [];

    public function add(Number $number)
    {
        $this->list[] = $number;
    }

    /**
     * @return Number[]
     */
    public function iterator(): iterable
    {
        foreach ($this->list as $number) {
            yield $number;
        }
    }
}