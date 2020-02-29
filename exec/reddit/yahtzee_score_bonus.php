<?php

/**
 * https://www.reddit.com/r/dailyprogrammer/comments/dv0231/20191111_challenge_381_easy_yahtzee_upper_section/
 */

use exer\reddit\Yahtzee;

require_once __DIR__.'/../../vendor/autoload.php';

$yahtzee = new Yahtzee();
$array = [1654, 1654, 50995, 30864, 1654, 50995, 22747,
    1654, 1654, 1654, 1654, 1654, 30864, 4868, 1654, 4868, 1654,
    30864, 4868, 30864];
$maxNumber = max($array);
$yahtzee->setMaxNumber($maxNumber);
$maxScore = $yahtzee->upperFromArray($array);

echo "\n";
echo $maxScore;
echo "\n";