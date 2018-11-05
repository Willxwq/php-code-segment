<?php
/*
* 单例模式：确保一类只有一个实例。
*
* 下面是单例模式的一个示例，通过将构造方法置为私有，保证用户不能在任意地方使用new、clone、serialize来随意创建对象。
* 提供一个获取实例的静态方法，在方法中判断实例是否已经被实例化过，如果有已经实例化的对象，则返回此对象，反之创建对象。
* 从而保证全局中该类只有一个实例存在。
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
        var_dump($singletonOne->pro);
        $singletonTwo = Singleton::getInstance();
        var_dump($singletonTwo->pro);
    }
}
$test = new Test();
$test->run();