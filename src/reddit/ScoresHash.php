<?php

namespace exer\reddit;

use exer\numbers\Number;

class ScoresHash
{
    public $hash = [];

    public function __construct($limit = 6)
    {
        for ($i=1;$i<=$limit;$i++) {
            $this->hash[$i] = 0;
        }
    }

    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return Number
     */
    public function findMaxScore(): Number
    {
        $result = new Number(0);
        foreach ($this->hash as $score) {
            if ($result->value === 0) {
                $result->value = $score;
            }
            if ($result->value<$score) {
                $result->value = $score;
            }
        }

        return $result;
    }
}