<?php
namespace App\Shop;

interface Hasprice
{
    public function getPrice();
}

trait WithPrice
{
    public function getPrice()
    {
        return $this->price;
    }
}

class Order implements Hasprice
{
    use WithPrice;

    private $price;
    public $test1;
    protected $test2;

    public function __construct($price = 0.0)
    {
        $this->price = $price;
    }

    public function test()
    {
        echo "test" . PHP_EOL;
    }

    public function getClassVars()
    {
        echo '<pre>';
        print_r(get_class_vars(\App\Shop\Order::class)); // возвращает видимые статические свойства
        echo '</pre>';
    }

    public function getClassMethods()
    {
        echo '<pre>';
        print_r(get_class_methods(\App\Shop\Order::class)); // возвращает видимые статические свойства
        echo '</pre>';
    }
}



