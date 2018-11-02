<?php
/*
*	简易loC容器练习
*
 * 通过注册、绑定的方式向容器中添加一段可以被执行的回调（可以是匿名函数、非匿名函数、类的方法）作为生产一个类的实例的 脚本 ，只有在真正的 生产（make） 操作被调用执行时，才会触发
*/
interface ColorModuleInterface
{
    public function show(array $target);
}

class Red implements ColorModuleInterface
{
    public function show(array $target)
    {
        echo "This loC is Red<br>\n";
    }
}

class Blue implements ColorModuleInterface
{
    public function show(array $target)
    {
        echo "This loC is Blue<br>\n";
    }
}

class Color
{
    protected $module;

    public function __construct(ColorModuleInterface $module)
    {
        $this->module = $module;
    }
}

class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        array_unshift($parameters, $this);

        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}


// 创建一个容器
$container = new Container;

$container->bind('color', function($container, $moduleName) {
    return new Color($container->make($moduleName));
});

$container->bind('red', function($container) {
    return new Red;
});

$container->bind('blue', function($container) {
    return new Blue;
});

$color_1 = $container->make('color', ['red']);
$color_2 = $container->make('color', ['blue']);
$color_3 = $container->make('color', ['red']);

