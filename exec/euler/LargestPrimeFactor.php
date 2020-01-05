<?php

// https://projecteuler.net/problem=3

use exer\numbers\Number;
use exer\numbers\PrimeFactorsFinder;

require_once __DIR__.'/../../vendor/autoload.php';

$primeFactorsFinder = new PrimeFactorsFinder(new Number(600851475143 ));
$listOfPrimes = $primeFactorsFinder->find();

$listOfPrimes->print();