<?php

use exer\helpers\GeeksToGeeks;

require_once __DIR__.'/../../../vendor/autoload.php';

/**
 *
 * Перевести римское число в арабское
 * I II III IV V VI VII VIII IX X
 *
 * I - 1
 * V - 5
 * X - 10
 * L - 50
 * C - 100
 * D - 500
 * M - 1000
 *
 * Четерех кратное повторение лиюбой цифры запрещено
 *
 */

$input = <<<TEXT
2
V
III
DCCCLXXXVIII
IM
TEXT;

$output = <<<TEXT
5
3
888
999
TEXT;

$romeToArab = [
    'I' => 1,
    'V' => 5,
    'X' => 10,
    'L' => 50,
    'C' => 100,
    'D' => 500,
    'M' => 1000
];

$arabToRome = array_flip($romeToArab);

$main = function($str) {
    global $romeToArab;
    $integersSet = [];
    $romeSet = str_split($str);

    foreach ($romeSet as $romeDigit) {
        if (!isset($romeToArab[$romeDigit])) {
            continue;
        }
        $integersSet[] = $romeToArab[$romeDigit];
    }

    $max = array_max($integersSet);
    $maxCount = array_max_occurances($integersSet, $max);
    $maxLastIndex = array_max_last_index($integersSet, $max);
    $left = $right = [];

    foreach ($integersSet as $index => $value) {
        if ($value === $max) {
            continue;
        }
        if ($index < $maxLastIndex) {
            $left[] = $value;
        }
        if ($index > $maxLastIndex) {
            $right[] = $value;
        }
    }

    $leftVal = array_sum($left);
    $rightVal = array_sum($right);

    return ($max*$maxCount)-$leftVal+$rightVal;
};

function array_max_last_index($array, $max)
{
    $index = 0;

    foreach ($array as $possibleIndex => $value) {
        if ($value === $max) {
            $index = $possibleIndex;
        }
    }

    return $index;
}

function array_max_occurances($array, $max)
{
    $occurances = 0;

    foreach ($array as $value) {
        if ($value === $max) {
            $occurances++;
        }
    }

    return $occurances;
}

function array_max($array) {
    $max = 0;

    foreach ($array as $value) {
        if ($value > $max) {
            $max = $value;
        }
    }

    return $max;
}

GeeksToGeeks::test(GeeksToGeeks::main($input, $main), $output);