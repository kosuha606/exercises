<?php

/**
 *
 * aaaabbaa
 *
 * aabbaa
 *
 * abba
 *
 * Просто проходим по всем комбинациям удаляя по одной букве слева
 * Потом проходим по всем вариантам удаляя по одной букве справа
 *
 */

use exer\helpers\GeeksToGeeks;

require_once __DIR__.'/../../../vendor/autoload.php';

$input = <<<TEXT
1
aaaabbaasdasdddddj1lllvvvlll1sjalvznsladdalasjldfnlansdfladslfnallllasdflalsdf
TEXT;

$longestPolindrome = function($str) {
    $n = $tempN = strlen($str);
    $length = $n;

    while ($tempN>1) {
        $leftIndex = 0;
        while (($leftIndex+$length)<=$n) {
            $testStr = substr($str, $leftIndex, $length);
            if (isPolindrome($testStr)) {
                return $testStr;
            }
            $leftIndex++;
        }
        $tempN--;
        $length = $tempN;
    }


    return '';
};

function isPolindrome($str)
{
    $reverse = strrev($str);
    return $str === $reverse;
};

echo GeeksToGeeks::main($input, $longestPolindrome);
