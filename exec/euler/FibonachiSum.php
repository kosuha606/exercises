<?php

// https://projecteuler.net/problem=2

use exer\helpers\Profile;
use exer\numbers\EvenNumbersSum;
use exer\numbers\FibonachiSequence;

require_once __DIR__.'/../../vendor/autoload.php';

Profile::getInstance()->beginSession('fibonachi_sum', [Profile::TIME_FLAG, Profile::MEMORY_FLAG]);
$generator = new FibonachiSequence(4000000);
$list = $generator->build();
$sum = new EvenNumbersSum($list);

$list->print();
echo "\n";
echo $sum;
echo "\n";
Profile::getInstance()->dumpSession('fibonachi_sum');

echo Profile::getInstance()->printResultsAsText();