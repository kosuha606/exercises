<?php

/**
 * Тест для проверки поведения трейта
 * в разных условиях
 */

use exer\helpers\Printer;

require_once __DIR__.'/../../vendor/autoload.php';

Printer::ln('Тест трейтов');

scenario1();
scenario2();

function scenario2() {
    Printer::ln('Scenario2===>');
    trait Some2
    {
        public function __construct()
        {
            Printer::ln('traits constructor');
        }
    }

    class TestObj2
    {
        use Some2;

        public function __construct()
        {
            Printer::ln('Rewrited constructor');
        }
    }

    class TestObj2_1
    {
        use Some2;

        public function __construct()
        {
            $this->__construct();
        }
    }

    $test = new TestObj2();
    Printer::ln('===>Scenario2');
}

function scenario1() {
    Printer::ln('Scenario1===>');
    trait Some
    {
        public function __construct()
        {
            Printer::ln('traits constructor');
        }
    }

    class TestObj
    {
        use Some;
    }

    $test = new TestObj();
    Printer::ln('===>Scenario1');
}

