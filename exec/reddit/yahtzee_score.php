<?php

/**
 * https://www.reddit.com/r/dailyprogrammer/comments/dv0231/20191111_challenge_381_easy_yahtzee_upper_section/
 */

use exer\reddit\Yahtzee;

require_once __DIR__.'/../../vendor/autoload.php';

$yahtzee = new Yahtzee();
$maxScore = $yahtzee->upperFromArray([3, 3, 5, 5, 3, 3]);

echo "\n";
echo $maxScore;
echo "\n";