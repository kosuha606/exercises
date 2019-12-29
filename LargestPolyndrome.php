<?php


use exer\numbers\LargestPolyndormeFinder;

require_once __DIR__.'/vendor/autoload.php';

$finder = new LargestPolyndormeFinder(3);
$resultNumber = $finder->find();

echo $resultNumber;
echo "\n";