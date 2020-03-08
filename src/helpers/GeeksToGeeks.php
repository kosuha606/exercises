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

    public static function string_twostr($input, $callback)
    {
        $lines = explode("\n", $input);
        $output = '';
        for ($i = 1; $i < count($lines); $i += 2) {
            $one = isset($lines[$i]) ? $lines[$i] : '';
            $two = isset($lines[$i+1]) ? $lines[$i+1] : '';
            $output .= $callback($one, $two)."\n";
        }

        return $output;
    }

    public static function test($programResult, $output)
    {
        $outLines = explode("\n", $output);
        $resultLines = explode("\n", $programResult);

        foreach ($resultLines as $index => $value) {
            if ($value === '') {
                continue;
            }
            if ($value == $outLines[$index]) {
                Printer::ln('OK: '.$value);
            } else {
                Printer::ln('Error: '.$value.', expected: '.$outLines[$index]);
            }
        }
    }
}