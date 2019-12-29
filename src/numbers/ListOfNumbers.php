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
     * @return exer\Number[]
     */
    public function iterator(): iterable
    {
        foreach ($this->list as $number) {
            yield $number;
        }
    }

    /**
     * @return  Number[]
     */
    public function getList()
    {
        return $this->list;
    }

    public function count()
    {
        return count($this->list);
    }

    public function print()
    {
        /** @var Number $number */
        foreach ($this->iterator() as $number) {
            print($number);
            print("\n");
        }
    }
}