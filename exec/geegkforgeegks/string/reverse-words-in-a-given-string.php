<?php

use exer\helpers\Printer;
use exer\helpers\Profile;

require_once __DIR__.'/../../../vendor/autoload.php';

$input = <<<TEXT
2
i.like.this.program.very.much.i.like.this.program.very.much.i.like.this.program.very.much.i.like.this.program.very.much.i.like.this.program.very.much.i.like.this.program.very.much
pqr.mno
TEXT;

Profile::getInstance()->beginSession('reverse', [Profile::TIME_FLAG]);
Printer::ln('Reverse words in a given string');
Profile::getInstance()->dumpSession('reverse');
echo main($input);
echo Profile::getInstance()->printResultsAsText();

function main($input)
{
    $lines = explode("\n", $input);
    $output = '';
    for ($i = 1; $i < count($lines); $i++) {
        $output .= reverseSentence($lines[$i])."\n";
    }

    return $output;
}

function reverseSentence($line)
{
    $result = '';
    $wordsSet = explode('.', $line);

    for ($i = count($wordsSet)-1; $i >= 0; $i--) {
        $result .= $wordsSet[$i];
        if ($i !== 0) {
            $result .= '.';
        }
    }

    return $result;
}
