<?php

/**
 * https://practice.geeksforgeeks.org/problems/permutations-of-a-given-string/0
 *
 * Количество возможных перестановок определяется как n!
 * (n факториал), n - колво букв
 */

use exer\helpers\Profile;

require_once __DIR__.'/../../../vendor/autoload.php';

$input = <<<TEXT
2
ABC
ABSG
ABSGD
TEXT;

Profile::getInstance()->beginSession('permutions', [Profile::TIME_FLAG, Profile::MEMORY_FLAG]);
echo main($input);
Profile::getInstance()->dumpSession('permutions');

echo Profile::getInstance()->printResultsAsText();

function main($input)
{
    $lines = explode("\n", $input);
    $output = '';

    for ($i = 1; $i < count($lines); $i++) {
        $chrcnt = count(str_split($lines[$i]));
        $permutions = makePremutations($lines[$i]);
        $realCnt = count($permutions);
        $mathCnt = factorial($chrcnt);
        $output .= "\n";
        $output .= $lines[$i].": \n";
        $output .= "Real count:  $realCnt\n";
        $output .= "Math count: $mathCnt\n";
        $output .= join(',', $permutions)."\n";
    }

    return $output;
}

function factorial($n)
{
    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }

    return $result;
}

/**
 * 1 Перевести в массив
 * 2 Проход по первым символам,
 */

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