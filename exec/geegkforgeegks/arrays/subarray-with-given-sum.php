<?php

/**
 *
 * Задача:
 * Для заданного массива A размером N целых неотрицательных чисел
 * найти непрервыный подмассив, сумма которого равна S.
 *
 * Вход:
 * Первая строка - колво тестов
 * Каждый тест состоит из 2-х строк,
 * В первой строке первое число = N второе = S
 * Во второй строке просто набор элементов массива
 *
 * Выход:
 * В каждой строке каждого теста вывести начальную и конечную
 * позиции искомого подмассива.
 *
 */

use exer\helpers\Printer;
use exer\helpers\Profile;

require_once __DIR__.'/../../../vendor/autoload.php';

$input = <<<TEXT
2
5 12
1 2 3 7 5
20 31
1 2 3 4 5 6 7 8 9 10 1 2 3 4 5 6 7 8 9 10
TEXT;

$output = <<<TEXT
2 4
1 5
TEXT;

Printer::ln('Subarray with given sum');
echo parseTask($input);
echo Profile::getInstance()->printResultsAsText();

function parseTask($input) {
    $lines = explode("\n", $input);
    $output = '';

    for ($i = 1; $i < count($lines); $i += 2) {
        Profile::getInstance()->beginSession("#$i", [Profile::TIME_FLAG]);
        $firstLine = explode(' ', $lines[$i]);
        $sum = $firstLine[1];
        $arrLen = $firstLine[0];
        $array = explode(' ', $lines[$i+1]);
        $output .= solveTask((int)$sum, (int)$arrLen, $array)."\n";
        Profile::getInstance()->dumpSession("#$i");
    }

    return $output;
}

function solveTask($sum, $arrLen, $array) {
    $beginIndex = 0;
    $endIndex = $arrLen-1;
    $tempSum = 0;
    $tempIndex = 0;

    // Цикл продолжается пока либо суммы не равны
    // либо пока стартовый индекс меньше конечного
    while (
        $tempSum !== $sum
        && $beginIndex < $arrLen
    ) {
        // Если текущий индекс больше индекса конца, то увеличиваем индекс начала на 1
        // А индекс конца устанавливаем на максимальное кол-во в массиве
        if ($tempIndex > $endIndex) {
            $beginIndex += 1;
            $endIndex = $arrLen-1;
            $tempIndex = $beginIndex;
            $tempSum = 0;
            continue;
        }

        $tempSum += (int)$array[$tempIndex];

        // Если временная сумма больше нужной и индекс начала меньше индекса конца
        // То можно сократить индекс конца и начать итерации с начала
        if (
            $tempSum > $sum &&
            $beginIndex < $endIndex
        ) {
            $endIndex -= 1;
            $tempIndex = $beginIndex;
            $tempSum = 0;
            continue;
        }

        $tempIndex++;
    }

    // Если последний текущий индекс меньше или равен
    // индекса  Начала то результат не найден
    if ($beginIndex >= $tempIndex) {
        return -1;
    }

    $beginIndex += 1;
    $endIndex = $tempIndex;

    return "$beginIndex $endIndex";
}
