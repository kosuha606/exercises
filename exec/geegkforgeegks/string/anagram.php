<?php

use exer\helpers\GeeksToGeeks;

require_once __DIR__.'/../../../vendor/autoload.php';

/**
 * Даны две строки a и b проверить что
 * строка а является анограмой строки b,
 * то есть содержит то же самое кол-во букв
 */

$input = <<<TEXT
2
geeksforgeeks forgeeksgeeks
allergy allergic
helloworld rdlowlleho
TEXT;

$output = <<<TEXT
YES
NO
YES
TEXT;

$main = function($str) {
    $parts = explode(' ', $str);
    $a = $parts[0];
    $b = $parts[1];
    $aArr = str_split($a);
    $bArr = str_split($b);
    $aMap = strMap($aArr);
    $bMap = strMap($bArr);
    $isAnogram = true;

    foreach ($aMap as $letter => $amount) {
        if (!isset($bMap[$letter])) {
            $isAnogram = false;
            break;
        }
        if ($amount != $bMap[$letter]) {
            $isAnogram = false;
            break;
        }
    }

    return $isAnogram ? 'YES' : 'NO';
};

function strMap($lettersMap) {
    $result = [];
    foreach ($lettersMap as $value) {
        if (empty($result[$value])) {
            $result[$value] = 1;
        } else {
            $result[$value] += 1;
        }
    }

    return $result;
}


GeeksToGeeks::test(GeeksToGeeks::main($input, $main), $output);

