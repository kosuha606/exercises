<?php

namespace exer\helpers;

/**
 * Помощник для задач с GeeksToGeeks
 */
class GeeksToGeeks
{
    public static function main($input, $callback)
    {
        $lines = explode("\n", $input);
        $output = '';
        for ($i = 1; $i < count($lines); $i++) {
            $output .= $callback($lines[$i])."\n";
        }

        return $output;
    }
}