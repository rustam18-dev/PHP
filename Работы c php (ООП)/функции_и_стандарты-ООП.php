<?php

require_once 'App/Shop/Order.php';

$config = [
    'order' => '\App\Shop\Order'
];

$order = new $config['order'];



//$order->getClassVars();  // возвращает видимые статические свойства
//$order->getClassMethods();  // возвращает видимые статические Методы

var_dump(method_exists($order,  'getPrice'));
var_dump(property_exists($order, 'test1'));

//method_exists(); property_exists() // Функции проверки существования свойств и методов.



//echo '<pre>';
//print_r(get_class_vars(\App\Shop\Order::class)); // возвращает видимые статические свойства
//echo '</pre>';



//if($order instanceof  \App\Shop\Hasprice){
//    echo $order->getPrice() . PHP_EOL;
//} else{
//    echo $order->test();
//}


//echo get_class($order);
//var_dump(get_parent_class($order)); // Аналог(выдаёт родительский объект
// Функция опеделения класса объекта

//echo '<pre>';
//print_r(get_declared_classes());
//print_r(get_declared_interfaces());
//print_r(get_declared_traits());
//echo '</pre>';
// Функции получение объявленных классов


//if(class_exists($config['order'])){
//    echo "Класс " . $config['order'] . ' существует' . PHP_EOL;
//}
//
//    if (trait_exists('\App\Shop\WithPrice'))
//    {
//        echo "Трейт Withprice существует" . PHP_EOL;
//    }
//
//if (interface_exists('\App\Shop\Hasprice')){
//        echo "Интерфейс Hasprice существует";
//}
//
//$order = new $config['order'];
////$order->test();
