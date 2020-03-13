<?php

use exer\helpers\GeeksToGeeks;

require_once __DIR__.'/../../../vendor/autoload.php';

/**
 *
 *
 * ab => aba bab
 * abc => aabaa
 *
 */

$input = <<<TEXT
3
abcd
aba
geeks
TEXT;

$output = <<<TEXT
3
0
4
TEXT;

$main = function($str) {
    $variants = str_split($str);
    $length = 2;
    $tempStr = substr($str, 0, $length);

    while (strlen($tempStr) <= strlen($str)) {
        $variants = array_merge($variants, makePremutations($tempStr));
        $length++;
        $tempStr = substr($str, 0, $length);
        if ($str === $tempStr) {
            break;
        }
    }

    $result = false;
    foreach ($variants as $variant) {
        if (isPolindrome($str.$variant)) {
            $result = $variant;
            break;
        }

        if (isPolindrome($variant.$str)) {
            $result = $variant;
            break;
        }

        foreach ($variants as $variant2) {
            if (isPolindrome($variant.$str.$variant2)) {
                $result = $variant.$variant2;
                break;
            }

            if (isPolindrome($variant2.$str.$variant)) {
                $result = $variant2.$variant;
                break;
            }
        }
    }
    if (isPolindrome($str)) {
        $result = '';
    }

    return $result !== false ? strlen($result) : $result;
};

function isPolindrome($str)
{
    $reverse = strrev($str);
    return $str === $reverse;
};

function makePremutations($string)
{
    $strSet = str_split($string);
    $variants = makePermut($strSet);
    $test = [];

    foreach ($variants as $letter => $value) {
        printPermut($value, $letter, $test);
    }

    return $test;
}

function printPermut($variants, $set, &$test)
{
    if (is_array($variants)) {
        foreach ($variants as $letter => $value) {
            printPermut($value, $set.$letter, $test);
        }
    } else {
        $test[] = $set.$variants;
    }
}

function makePermut($strSet)
{
    $n = count($strSet);

    if ($n > 1) {
        $variants = [];

        for ($i = 0; $i < $n; $i++) {
            $curLetter = $strSet[$i];
            $restArray = $strSet;
            unset($restArray[$i]);
            $variants[$curLetter] = makePermut(array_values($restArray));
        }

        return $variants;
    } else {
        return $strSet[0];
    }
}

GeeksToGeeks::test(GeeksToGeeks::main($input, $main), $output);