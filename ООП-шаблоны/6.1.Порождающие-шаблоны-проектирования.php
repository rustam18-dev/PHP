<pre>
<?php
//// TODO: Фабричный метод (транспорт который перенаправляет животных на
//// TODO: подходящих транспортах)
//interface Transport
//{
//    public function move($product);
//}
//
//class Boat implements Transport
//{
//    public function move($product)
//    {
//        echo $product . " едет по воде." . PHP_EOL;
//    }
//}
//
//class Car implements Transport
//{
//    public function move($product)
//    {
//        echo $product . " едет по дороге." . PHP_EOL;
//    }
//}
//
//interface FactoryMethod
//{
//    public function getTransport($product);
//}
//
//class TransportFactory implements FactoryMethod
//{
//    const ROAD_TRANSPORT = 'road';
//    const WATER_TRANSPORT = 'water';
//
//    public function getTransport($product)
//    {
//        $transport = $this->getOptimalWayForProduct($product);
//
//        switch ($transport){
//            case static::ROAD_TRANSPORT:
//                return new Car();
//            case static::WATER_TRANSPORT:
//                return new Boat();
//        }
//        return false;
//    }
//    private function getOptimalWayForProduct($product)
//    {
//        $optimalWay = [
//            'Белка' => TransportFactory::ROAD_TRANSPORT,
//            'Кот' => TransportFactory::ROAD_TRANSPORT,
//            'Бегемот' => TransportFactory::WATER_TRANSPORT
//        ];
//
//        return $optimalWay[$product];
//    }
//}
//
//$product = ['Белка', 'Кот', 'Бегемот'];
//
//foreach ($product as $product) {
//
//    $transport = (new TransportFactory())->getTransport($product);
//    $transport->move($product);
//}
//
//
//// TODO: Абстрактная фабрика
//interface Chair {}
//interface Table {}
//interface Couch {}
//
//class WoodenChair implements Chair {}
//class WoodenTable implements Table {}
//class WoodenCouch implements Couch {}
//
//interface FurnitureFactory
//{
//    public function createChair() : Chair;
//    public function createTable() : Table;
//    public function createCouch() : Couch;
//}
//
//class WoodenFurnitureFactory implements FurnitureFactory
//{
//    public function createChair() : Chair
//    {
//        return new WoodenChair();
//    }
//
//    public function createTable() : Table
//    {
//        return new WoodenTable();
//    }
//
//    public function createCouch() : Couch
//    {
//        return new WoodenCouch();
//    }
//}
//
//class Fabric
//{
//    const MATERIAL_WOOD = 'wood';
//
//    public static function createFactory($fabric) : FurnitureFactory
//    {
//        switch ($fabric) {
//            case static::MATERIAL_WOOD:
//                return new WoodenFurnitureFactory();
//        }
//        return false;
//    }
//}
//
//function getFurnitureCollection($type)
//{
//    $fabric = Fabric::createFactory($type);
//
//    return [
//        'chair' => $fabric->createChair(),
//        'table' => $fabric->createTable(),
//        'couch' => $fabric->createCouch()
//    ];
//}
//
//$collection = getFurnitureCollection(Fabric::MATERIAL_WOOD);
//
//print_r($collection);
//
//// TODO: Строитель/Build (этот метод полезен, при отсутствии чётких задач для проектирование)
//
//class House
//{
//    private $walls;
//    private $floor;
//    private $roof;
//    private $garage;
//
//    public function setWalls($walls)
//    {
//        $this->walls = $walls;
//    }
//
//    public function setFloor($floor)
//    {
//        $this->floor = $floor;
//    }
//
//    public function setRoof($roof)
//    {
//        $this->roof = $roof;
//    }
//
//    public function setGarage($garage)
//    {
//        $this->garage = $garage;
//    }
//}
//
//class HouseBuilder
//{
//    private $house;
//
//    public function __construct()
//    {
//        $this->house = new House();
//    }
//
//    public function getHuse() : House
//    {
//        return $this->house;
//    }
//
//    public function buildRoof($roof) : HouseBuilder
//    {
//        $this->getHuse()->setRoof($roof);
//        return $this;
//    }
//
//    public function buildFloor($floor) : HouseBuilder
//    {
//        $this->getHuse()->setFloor($floor);
//        return $this;
//    }
//
//    public function buildWalls($walls) : HouseBuilder
//    {
//        $this->getHuse()->setWalls($walls);
//        return $this;
//    }
//
//    public function buildGarage($garage) : HouseBuilder
//    {
//        $this->getHuse()->setGarage($garage);
//        return $this;
//    }
//}
//
//$house = (new HouseBuilder());
//$house
//    ->buildRoof('Шифер')
//    ->buildWalls('Бревна')
//    ->buildFloor('Доски')
//    ->getHuse()
//;
//
//// TODO: Одиночка/Singleton
//
//final class Configuration
//{
//    private static $instance;
//    private $configs = [];
//
//    private function __construct() {}
//
//    public static function getInstance() : Singleton
//    {
//        if (null === static::$instance) {
//            static::$instance = new static();
//        }
//
//        return static::$instance;
//    }
//
//    public function getConfig($key, $default = null)
//    {
//        return $this->configs[$key] ?? $default;
//    }
//
//    public function setConfig($key, $value)
//    {
//       $this->configs[$key] = $value;
//       return $this;
//    }
//}
//
//$config = Configuration::getInstance();
//$config
//    ->setConfig('user', 1)
//    ->setConfig('is_admin', false)
//    ->setConfig('last_login', time())
//;

// TODO: Прототип/Prototype

class Author
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

abstract class BookPrototype
{
    protected $title;
    protected $category;
    public $author;

    abstract public function __clone();

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author;
        return $this;
    }
}

class StoryBookPrototype extends BookPrototype
{
    protected $category = 'Повесть';
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}

$storyBook = new StoryBookPrototype();

$book1 = clone $storyBook;
$book1
    ->setAuthor(new Author('Пушкин'))
    ->setTitle('Пиковая дама')
;
print_r($book1);

$book2 = clone $book1;
$book2->setTitle('Нос');
$book2->author->name = 'Гоголь';

print_r($book2);


