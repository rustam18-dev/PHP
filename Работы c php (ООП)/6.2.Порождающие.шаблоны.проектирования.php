<pre>
<?php
//TODO: Фабричный метод
//TODO: Транспортная компания, которая осуществляет перевозку груза разными способами, необходимо для выбранного груза определить самую оптимальный спобод доставки

interface Transport
{
    public function move($product);
}

class Boat implements Transport
{
    public function move($product)
    {
        echo $product . ' едет по воде.' . PHP_EOL;
    }
}

class Car implements Transport
{
    public function move($product)
    {
        echo $product . ' едет по дороге ' . PHP_EOL;
    }
}

interface FactoryMethod
{
    public function getTransport($product) : Transport; //Реализующий интресфейс Transport
}

class TransportFactory implements FactoryMethod
{
    const ROAD_TRANSPORT = 'road';
    const WATER_TRANSPORT = 'water';

    public function getTransport($product): Transport
    {
        $transport = $this->getOptimalWayForProduct($product);

        switch ($transport){
            case static::ROAD_TRANSPORT:
                return new Car();
            case static::WATER_TRANSPORT:
                return new Boat();
        }

        return false;
    }

    private function getOptimalWayForProduct($product)
    {
        $optimalWay = [
            'Белка' => TransportFactory::ROAD_TRANSPORT,
            'Кот' => TransportFactory::ROAD_TRANSPORT,
            'Бегемот' => TransportFactory::WATER_TRANSPORT
        ];
        return $optimalWay[$product];
    }
}

$product = ['Белка', 'Кот', 'Бегемот'];

foreach ($product as $product) {

    $transport = (new TransportFactory())->getTransport($product);
    $transport->move($product);
}

// TODO: Абстрактная фабрика - предоставляет интерфейс для создания семейств объектов, не привязываясь к конкретным реальзациям.
// TODO: Мобельная фабрика которая производит столы и стулья, мебели выполнены из разных материалов и в разных стилях, а также покупателя должен быть выбор покупать отдельные товары и коллекции товаров выполненные в одному стиле

interface Chair {}
interface Table {}
interface Couch {}
interface Bed {}

class WoodenChair implements Chair {}
class WoodenTable implements Table {}
class WoodenCouch implements Couch {}
class IronBed implements Bed {}

interface FurnitureFactory
{
    public function createChair() : Chair;
    public function createTable() : Table;
    public function createCouch() : Couch;
    public function createBed() : Bed;
}

class WoodenFurnitureFactory implements FurnitureFactory
{
    public function createChair() : Chair
    {
        return new WoodenChair();
    }

    public function createTable() : Table
    {
        return new WoodenTable();
    }

    public function createCouch() : Couch
    {
        return new WoodenCouch();
    }

    public function createBed() : Bed
    {
        return new IronBed();
    }

}

class IronFurnitureFactory implements FurnitureFactory
{
    public function createChair() : Chair
    {
        return new WoodenChair();
    }

    public function createTable() : Table
    {
        return new WoodenTable();
    }

    public function createCouch() : Couch
    {
        return new WoodenCouch();
    }

    public function createBed() : Bed
    {
        return new IronBed();
    }

}


class Fabric
{
    const MATERIAL_WOOD = 'wood';
    const MATERIAL_IRON = 'iron';

    public static function createFactory($fabric) : FurnitureFactory
    {
        switch ($fabric) {
            case static::MATERIAL_WOOD;
                 return new WoodenFurnitureFactory();
            case static::MATERIAL_IRON;
                return new IronFurnitureFactory();
        }
        return false;
    }

}

function getFurnitureCollection($type)
{
    $fabric = Fabric::createFactory($type);

    return [
        'chair' => $fabric->createChair(),
        'table' => $fabric->createTable(),
        'Couch' => $fabric->createCouch(),
        'Bed' => $fabric->createBed(),
    ];
}

$collection = getFurnitureCollection(Fabric::MATERIAL_WOOD);
echo '<br>';
$collection = getFurnitureCollection(Fabric::MATERIAL_IRON);

print_r($collection);

// TODO: Строитель / Builder
// Стройка дома

class House
{
    private $walls;
    private $floor;
    private $roof;
    private $garage;

    public function setWalls($walls)
    {
        $this->walls = $walls;
    }

    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    public function setRoof($roof)
    {
        $this->roof = $roof;
    }

    public function setGarage($garage)
    {
        $this->garage = $garage;
    }
}

class HouseBuilder
{
    private $house;

    public function __construct()
    {
        $this->house = new House();
    }

    public function getHouse() : House
    {
        return $this->house;
    }

    public function buildRoof($roof) : HouseBuilder
    {
        $this->getHouse()->setRoof($roof);
        return $this;
    }

    public function buildFloor($floor) : HouseBuilder
    {
        $this->getHouse()->setFloor($floor);
        return $this;
    }
    public function buildWalls($walls) : HouseBuilder
    {
        $this->getHouse()->setWalls($walls);
        return $this;
    }

    public function buildGarage($garage) : HouseBuilder
    {
        $this->getHouse()->setGarage($garage);
        return $this;
    }

}

$house = (new HouseBuilder());
$house
    ->buildFloor('Доски' )
    ->buildRoof('Шифер')
    ->buildWalls('Бревна')
    ->getHouse()
;

