<?php
//function test($name, callable $callback)
//{
//    echo 'invoke: ' . $callback($name) . PHP_EOL;
//    echo 'user_func: ' . call_user_func_array($callback, [$name]) . PHP_EOL;
//}
//
//function simpleHellow($name)
//{
//    return 'Simple Hello To: ' . $name;
//}
//
//class SayHello
//{
//    public static function helloStatic($name = '')
//    {
//        return 'Say Hello To: ' . $name;
//    }
//
//    public function hello($name = '')
//    {
//        return 'Say Hello To: ' . $name;
//    }
//}
//
//echo "<pre>";
//
//test('World', 'simpleHellow');
//test('Anonym', function ($name)
//{
//    return 'Hello To: ' .  $name . PHP_EOL;
//});
//
//$ob = new SayHello();
//test('Static', [SayHello::class, 'helloStatic']);
//test('Non-static', [$ob, 'hello']);
//echo "</pre>";
//
//
//class ClousureExample
//{
//    private $value = 0;
//
//    public function __construct(int $value)
//    {
//        $this->value = $value;
//    }
//
//    private function getValue()
//    {
//        return $this->value;
//    }
//
//    public function formatValue(Closure $closure)
//    {
//        return $closure->call($this);
//    }
//}
//
//$formater = function ()
//{
//    return sprintf('Price: %01.10f$', $this->getValue());
//};
//
//$example = new ClousureExample(5);
//
//echo $example->formatValue($formater);


interface Formatter{
    public function format($value);
}

function format($value, Formatter $formatter){
    echo $formatter->format($value) . PHP_EOL;
}

$tmpClass = new class implements Formatter{
    public function Format($value)
    {
        return sprintf("Price: %01.10f$", $value);
    }
};

format(10.23123, $tmpClass);







































