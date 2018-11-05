<?php
/*
*
* 单例模式：确保一类只有一个实例。
*
*/
class Singleton
{
    static private $instance = null;
    private function __construct() {}
    private function __wakeup() {}
    private function __clone() {}
    static public function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new self;
        }
        return static::$instance;
    }
}
class Test
{
    public function run()
    {
        $singletonOne = Singleton::getInstance();
        $singletonOne->pro = 'Hello';
        $singletonTwo = Singleton::getInstance();
        $singletonTwo->pro = 'World';
        // $singletonThree = clone $singletonOne;
        // $singletonThree->pro = 'Test';
        var_dump($singletonOne->pro);
        var_dump($singletonTwo->pro);
        // var_dump($singletonThree->pro);
    }
}
$test = new Test();
$test->run();