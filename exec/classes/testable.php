<?php


use exer\helpers\Printer;
use Psr\Container\ContainerInterface;

require_once __DIR__.'/../../vendor/autoload.php';

Printer::ln('Testable code');

/**
 * Вывод:
 *  Testable code
 *  Run test
 *  testMethod
 *  bool(true)
 */
function main() {
    $test = new Test();
    $object = $test->get(new Obj());
    $object->testMethod();
    var_dump($test->passed($object));
}

class Test implements ContainerInterface
{
    private $testMap;

    private $testResults;

    public function __construct()
    {
        $this->testMap = [
            Obj::class => function () {
                Printer::ln('Run test');
                return true;
            }
        ];
    }

    public function get($object)
    {
        if ($this->has($object)) {
            $class = get_class($object);
            if ($result = call_user_func($this->testMap[$class])) {
                $this->testResults[$class] = $result;
                return $object;
            }
        }

        throw new \Exception("No test for class $class");
    }

    public function has($object)
    {
        $class = get_class($object);
        return isset($this->testMap[$class]);
    }

    public function passed($object)
    {
        $class = get_class($object);
        return !empty($this->testResults[$class]);
    }
}

class Obj
{
    public function testMethod()
    {
        Printer::ln('testMethod');
    }
}

main();