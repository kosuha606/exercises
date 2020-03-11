<?php

use exer\helpers\GeeksToGeeks;

require_once __DIR__.'/../../../vendor/autoload.php';

$input = <<<TEXT
2
geeksforgeeks
geeks for geeks
helloworld
TEXT;

$output = <<<TEXT
geksfor
geks for
helowrd
TEXT;

$main = function($str) {
    $chars = str_split($str);
    $usedCharsMap = [];
    $result = '';

    foreach ($chars as $char) {
        if (!isset($usedCharsMap[$char])) {
            $result .= $char;
        }
        $usedCharsMap[$char] = $char;
    }

    return $result;
};

GeeksToGeeks::test(GeeksToGeeks::main($input, $main), $output);


