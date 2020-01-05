<?php

// https://projecteuler.net/problem=2

use exer\numbers\EvenNumbersSum;
use exer\numbers\FibonachiSequence;

require_once __DIR__.'/../../vendor/autoload.php';

$generator = new FibonachiSequence(4000000);
$list = $generator->build();
$sum = new EvenNumbersSum($list);

$list->print();
echo "\n";
echo $sum;
echo "\n";