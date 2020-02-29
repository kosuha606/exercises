<?php

namespace exer\helpers;

class Profile
{
    const TIME_FLAG = 1;

    const MEMORY_FLAG = 2;

    private static $instance;

    protected $flagsProcessors = [];

    protected $flagsDumpers = [];

    protected $flagsLabels = [];

    private $sessions;

    private $sessionsData;

    private $sessinsResults;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new static();
            self::$instance->init();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    public function init()
    {
        $this->flagsLabels = [
            self::TIME_FLAG => 'Time',
            self::MEMORY_FLAG => 'Memory',
        ];
        $this->flagsDumpers = [
            self::TIME_FLAG => [$this, 'timeDump'],
            self::MEMORY_FLAG => [$this, 'memoryDump'],
        ];
        $this->flagsProcessors = [
            self::TIME_FLAG => [$this, 'timeProcess'],
            self::MEMORY_FLAG => [$this, 'memoryProcess'],
        ];
    }

    public function beginSession($name, $profileFlags)
    {
        $this->sessions[$name] = $profileFlags;

        foreach ($profileFlags as $flag) {
            call_user_func($this->flagsProcessors[$flag], $name);
        }
    }

    public function dumpSession($name)
    {
        $flags = $this->sessions[$name];
        $result = [];

        foreach ($flags as $flag) {
            $result[$flag] = call_user_func($this->flagsDumpers[$flag], $name);
        }

        $this->sessinsResults[$name] = $result;

        return $result;
    }

    protected function timeProcess($name)
    {
        $this->sessionsData[$name]['time'] = round(microtime(true) * 1000);
    }

    protected function timeDump($name)
    {
        $beginTime = $this->sessionsData[$name]['time'];
        $now = round(microtime(true) * 1000);

        return [
            'executionTime' => ($now - $beginTime).' ms',
        ];
    }

    protected function memoryProcess($name)
    {
        $this->sessionsData[$name]['memory'] = memory_get_usage(1);
    }

    protected function memoryDump($name)
    {
        $beginMemory = $this->sessionsData[$name]['memory'];
        $now = memory_get_usage(1);

        return [
            'usedMemory' => $now - $beginMemory
        ];
    }

    /**
     * @return mixed
     */
    public function getSessinsResults()
    {
        return $this->sessinsResults;
    }

    public function printResultsAsText()
    {
        $result = "";
        foreach ($this->sessinsResults as $name => $values) {
            $result .= "$name: \n";
            foreach ($values as $flagId => $flagValues) {
                $result .= "{$this->flagsLabels[$flagId]}: \n";
                foreach ($flagValues as $parameter => $value) {
                    $result .= "\t $parameter: $value \n";
                }
            }
        }

        return $result;
    }
}