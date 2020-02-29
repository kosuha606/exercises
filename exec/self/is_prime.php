<?php


use exer\helpers\Printer;
use exer\helpers\Profile;

require_once __DIR__.'/../../vendor/autoload.php';

Printer::ln('Is prime algorithm');

/**
 * Версия с квадратным корнем
 * @param $number
 * @return bool
 */
function isPrimeSqrt($number)
{
    $result = true;
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            $result = false;
            break;
        }
    }

    return $result;
}

/**
 * Версия с полным перебором
 */
function isPrimeBrutal($number)
{
    $result = true;
    for ($i= 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $result = false;
            break;
        }
    }

    return $result;
}

/**
 * Версия с бинарным поиском
 */
function isPrimeBinarySqrt($number)
{
    $result = true;
    $low = 2;
    $high = sqrt($number);

    return $result;
}

// Тестирование

$maxNumber = 9999;

$totalPrimes = 0;
Profile::getInstance()->beginSession('sqrt', [Profile::TIME_FLAG]);
foreach (range(1, $maxNumber) as $number) {
    if (isPrimeSqrt($number)) {
        $totalPrimes += 1;
    }
}
echo "#sqrt $totalPrimes \n";
Profile::getInstance()->dumpSession('sqrt');

$totalPrimes = 0;
Profile::getInstance()->beginSession('brutal', [Profile::TIME_FLAG]);
foreach (range(1, $maxNumber) as $number) {
    if (isPrimeBrutal($number)) {
        $totalPrimes += 1;
    }
}
echo "#brutal $totalPrimes \n";
Profile::getInstance()->dumpSession('brutal');


echo Profile::getInstance()->printResultsAsText();

Printer::ln('');