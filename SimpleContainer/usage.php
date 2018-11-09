<?php
require_once 'simpleContainer.php';
interface AInterface
{
    public function run();
}
class A implements AInterface
{
    public function run()
    {
        return 'I am A!';
    }
}
class B implements AInterface
{
    public function run()
    {
        return 'I am B!';
    }
}
class C
{
    private $example;
    public function __construct(AInterface $example)
    {
        $this->example = $example;
    }
    public function run()
    {
        $str = $this->example->run();
        return '<<<< '.$str.' >>>>';
    }
}
$container = new SimpleContainer();
//示例1
$container->set('AInterface', 'B');
//$a = $container->get('AInterface');
//var_dump($a->run());
//示例2
$b = $container->get('C');
var_dump($b->run());