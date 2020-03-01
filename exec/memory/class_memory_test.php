<?php

use exer\helpers\Profile;

require_once __DIR__.'/../../vendor/autoload.php';


class OneField
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }
}

class FiveFields
{
    private $number1;

    private $number2;

    private $number3;

    private $number4;

    private $number5;

    public function __construct(
        $number,
        $number1,
        $number2,
        $number3,
        $number4
    ) {
        $this->number1 = $number;
        $this->number2 = $number1;
        $this->number3 = $number2;
        $this->number4 = $number3;
        $this->number5 = $number4;
    }
}

class EmptyClass
{

}

$limit = 999999;

$empty = [];
Profile::getInstance()->beginSession('empty', [Profile::MEMORY_FLAG, Profile::TIME_FLAG]);
foreach (range(1, $limit) as $number) {
    $empty[] = new EmptyClass();
}
Profile::getInstance()->dumpSession('empty');


$numbers = [];
Profile::getInstance()->beginSession('one field integer', [Profile::MEMORY_FLAG, Profile::TIME_FLAG]);
foreach (range(1, $limit) as $number) {
    $numbers[] = new OneField($number);
}
Profile::getInstance()->dumpSession('one field integer');

$numbers2 = [];
Profile::getInstance()->beginSession('5 field integer', [Profile::MEMORY_FLAG, Profile::TIME_FLAG]);
foreach (range(1, $limit) as $number) {
    $numbers2[] = new FiveFields(
        $number,
        $number,
        $number,
        $number,
        $number
    );
}
Profile::getInstance()->dumpSession('5 field integer');

$strings = [];
Profile::getInstance()->beginSession('one field string', [Profile::MEMORY_FLAG, Profile::TIME_FLAG]);
foreach (range(1, $limit) as $number) {
    $strings[] = new OneField('Some string not too long not too short');
}
Profile::getInstance()->dumpSession('one field string');

$strings2 = [];
Profile::getInstance()->beginSession('5 field string', [Profile::MEMORY_FLAG, Profile::TIME_FLAG]);
foreach (range(1, $limit) as $number) {
    $strings2[] = new FiveFields(
        'Some string not too long not too short',
        'Some string not too long not too short',
        'Some string not too long not too short',
        'Some string not too long not too short',
        'Some string not too long not too short'
    );
}
Profile::getInstance()->dumpSession('5 field string');



echo Profile::getInstance()->printResultsAsText();