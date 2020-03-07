<?php


use exer\helpers\GeeksToGeeks;
use exer\helpers\Printer;

require_once __DIR__.'/../../../vendor/autoload.php';

/**
 * Задача:
 * Удалить все дублирующиеся символы из строки
 * рекурсивно
 *
 * Вход:
 * 2
 * geeksforgeek
 * acaaabbbacdddd
 *
 * Вывход:
 * gksforgk
 * acac
 *
 * Псевдокод:
 * функция(текущй_символ, следующий_символ);
 *
 * реузальтат = []
 * цикл (по всем символам)
 *  символ = функция(тек, след)
 *  если символ
 *      результат[] = символ
 *  или
 *      i++ // Пропускаем след символ
 *
 * вернуть результат
 *
 */

Printer::ln('Recursively remove all adjacent duplicates');

$input = <<<TEXT
2
kosuha606
geeksforgeek
acaaabbbacdddd
acaaabbbbbbbacdddd
heenteenen
TEXT;

$main = function($str) {
    $result = removeAdjacentDuplicates($str);

    return implode('', $result);
};

function removeAdjacentDuplicates($str, $pos = 0)
{
    $curLetter = isset($str[$pos]) ? $str[$pos] : false;
    $nextLetter = isset($str[$pos+1]) ? $str[$pos+1] : false;
    $result = [];

    if ($curLetter === false) {
        return $result;
    }

    if ($curLetter !== $nextLetter) {
        $result[] = $curLetter;
    } else {
        do {
            $nextLetter = isset($str[$pos+1]) ? $str[$pos+1] : false;
            if ($curLetter === $nextLetter) {
                $pos++;
            }
        } while($curLetter === $nextLetter);
    }

    if ($nextLetter !== false) {
        $result = array_merge($result, removeAdjacentDuplicates($str, $pos+1));
    }

    return $result;
}


echo GeeksToGeeks::main($input, $main);