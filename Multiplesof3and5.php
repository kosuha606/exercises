<?php

$orderGenerator = new OrderListGenerator(1000);
$numbersList = $orderGenerator->build();
$multiplesFinder = new MultiplesFinder($numbersList);
$multiplesList = $multiplesFinder->find();
$sum = new NumbersSum($multiplesList);

echo "\n";
echo $sum;
echo "\n";

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

class NumbersSum
{
    private $sum;

    public function __construct(ListOfNumbers $listOfNumbers)
    {
        $sum = 0;
        foreach ($listOfNumbers->iterator() as $number) {
            $sum += $number->value;
        }
        $this->sum = $sum;
    }

    public function __toString()
    {
        return "Sum is $this->sum";
    }
}

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