<?php

use exer\helpers\GeeksToGeeks;
use exer\helpers\Printer;

require_once __DIR__.'/../../../vendor/autoload.php';

/**
 *
 * Даны две строки a и b
 * Нужно путем смешения на две позиции в любую сторону
 * из строки b получить строку a
 *
 */


Printer::ln("Check if string is rotated by two places");

$main = function ($one, $two) {
    $leftRotated = rotateStr($two, 2, 'left');
    $rightRotated = rotateStr($two, 2, 'right');

    return (int)($leftRotated===$one || $rightRotated===$one);
};

function rotateStr($str, $length, $direction = 'right') {
    $strLen = strlen($str);

    if ($direction === 'right') {
        $right = substr($str, 0, $strLen-$length);
        $left = substr($str, $strLen-$length, $length);
    } elseif ($direction === 'left') {
        $right = substr($str, 0, $length);
        $left = substr($str, $length, $strLen-$length);
    }

    return $left.$right;
}

$input = <<<TEXT
2
amazon
azonam
geeksforgeeks
geeksgeeksfor
helloworld
ldhellowor
TEXT;

$output = <<<TEXT
1
0
1
TEXT;


GeeksToGeeks::test(GeeksToGeeks::string_twostr($input, $main), $output);
