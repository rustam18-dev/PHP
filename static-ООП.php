<?php

//class Zoo
//{
//    protected static $animalsCount = 0;
//    private $name;
//
//    public function __construct($name)
//    {
//        $this->name = $name;
//    }
//
//    public static function getAnimalsCount()
//    {
//        return self::$animalsCount;
//    }
//
//    public function addAnimal()
//    {
//        self::$animalsCount++;
//    }
//
//    public static function hasAnimals()
//    {
//        return self::getAnimalsCount() > 0;
//    }
//
//
//
//    public  function describeZoo()
//    {
//        echo "В зоопарке " . $this->getName() . ' находится ' . self::getAnimalsCount() . ' животных';
//    }
//
//    public function getName()
//    {
//        return $this->name;
//    }
//
//}
//
//$zoo = new Zoo("Московский");
//$schoolZoom = new Zoo('Школьный');
//$zoo->addAnimal();
//
//
//echo $schoolZoom->getAnimalsCount();

class BaseTimer
{
    public static $time = 0;

    public function tic()
    {

    }
}
