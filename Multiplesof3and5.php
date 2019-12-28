<?php

use exer\numbers\MultiplesFinder;
use exer\numbers\NumbersSum;
use exer\numbers\OrderListGenerator;

require_once __DIR__.'/vendor/autoload.php';

$orderGenerator = new OrderListGenerator(1000);
$numbersList = $orderGenerator->build();
$multiplesFinder = new MultiplesFinder($numbersList);
$multiplesList = $multiplesFinder->find();
$sum = new NumbersSum($multiplesList);

echo "\n";
echo $sum;
echo "\n";