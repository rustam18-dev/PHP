<?php
class Goodbye {
    const LEAVING_MESSAGE = "Thank you for visiting W3schools.com!";
    public function byebye(){
        echo self::LEAVING_MESSAGE  . "<br>";
    }
}

$goodbye = new Goodbye();
$goodbye->byebye() ;


abstract class Car{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function intro() : string;
}

class Audi extends Car{
    public function intro(): string
    {
        return "Choose German quality! I'm an $this->name";
    }
}

class Volvo extends Car{
    public function intro(): string
    {
        return "Proud to be Swedish! I'm a $this->name";
    }
}

class Citroen extends Car{
    public function intro(): string
    {
       return "French extravagance! I'm a $this->name!";
    }
}

$audi = new audi("Audi");
echo $audi->intro()  . "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();