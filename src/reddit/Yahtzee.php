<?php

namespace exer\reddit;

use exer\numbers\Number;

class Yahtzee
{
    /**
     * @param Dice[] $arrayOfDices
     * @return Number
     */
    public function upper($arrayOfDices)
    {
        $scoresHash = new ScoresHash();
        foreach ($scoresHash->getHash() as $number => $maxResult) {
            foreach ($arrayOfDices as $dice) {
                if ($number === $dice->value) {
                    $scoresHash->hash[$number] += $number;
                }
            }
        }

        return $scoresHash->findMaxScore();
    }

    public function upperFromArray($array)
    {
        $arrayOfDices = [];
        foreach ($array as $item) {
            $arrayOfDices[] = new Dice($item);
        }

        return $this->upper($arrayOfDices);
    }
}