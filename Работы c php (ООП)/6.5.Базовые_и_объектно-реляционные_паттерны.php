<pre>
<?php
// TODO: Объект значение / Value Object
// TODO: Описанная точка на координате

//final class Point
//{
//    private $x, $y;
//
//    public function __construct($x, $y)
//    {
//        $this->x = $x;
//        $this->y = $y;
//    }
//
//    public function getX()
//    {
//        return $this->x;
//    }
//
//    public function getY()
//    {
//        return $this->y;
//    }
//
//    public function isEqual(Point $point)
//    {
//        return $this->getX() == $point->getX() && $this->getY() == $point->getY();
//    }
//}
//
//$point1 = new Point(1, 2);
//$point2 = new Point(1, 2);
//
//echo ($point1 === $point2 ? 'Равны' : 'Не равны') . PHP_EOL;
//echo ($point1->isEqual($point2) ? 'Равны' : 'Не равны') . PHP_EOL;

// TODO: Деньги / Money

final class Money
{
    private $amount;
    private $currency;

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function isEqual(Money $money)
    {
        if ($this->getCurrency() === $money->getCurrency()) {
            return $this->getAmount() === $money->getAmount();
        } else {
            // Выполняем конвертацию и сравниваем
        }
    }
}

$money1 = new Money(1, '$');
$money2 = new Money(1, '$');

echo ($money1 === $money2 ? 'Равны' : 'Не равны') . PHP_EOL;
echo ($money1->isEqual($money2) ? 'Равны' : 'Не равны') . PHP_EOL;

// TODO: Реестр / Registry
// TODO: Глобальный объект, который используется другими объектами для поиска общих объектов или служб


class Register
{
    private static $data = [];

    public static function set(string $key, $value)
    {
        self::$data[$key] = $value;
    }

    public static function get(string $key, $defaultValue = null)
    {
        return self::$data[$key] ?? $defaultValue;
    }
}
// TODO: Объектно-реляционые паттерны - слой приложения, отвечающий за доступ к данны

// TODO: 1) Преобразователь данных / Data Mapper
// TODO: Паттерн Data Mapper - это слой программного кода, отделяющий объект в памяти приложения от их отображения в базе данных.
// TODO: Его ответственность состоит в том, чтобы передавать данные между ними в обоих направления, а также изолировать их друг от друга.

class User
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public static function fromState(array $state)
    {
        return new static($state['name'], $state['email']);
    }
}

class StorageAdapter
{
    public function find($id)
    {
        return ['name' => 'Рустам', 'email' => 'rustam.radzabov8410@gmail.com'];
    }
}

class UserMapper
{
    private $adapter;

    public function __construct(StorageAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function findById($id)
    {
        $result = $this->adapter->find($id);
        if ($result === null) {
            throw new \InvalidArgumentException('Рустам #$id не найден');
        }

        return $this->mapRowToUser($result);
    }

    public function mapRowToUser(array $row) : User
    {
        return User::fromState($row);
    }
}

$mapper = new UserMapper(new StorageAdapter());

$user = $mapper->findById(1);

print_r($user);

// TODO: Единица работы / Unit of Work
// TODO: Паттерн Единица работы отслеживает изменения данных, которые мы производим с моделью в рамках бизнес-транзакции.
// TODO: После того, как бизнес-транзакция закрывается, т.е подтвержден выполнение всех операций, все изменения попадают в БД в виде единой транзакции.

class UnitOfWork
{
    private $news = [];
    private $updates = [];
    private $deletes = [];

    public function addNew($item)
    {
        $this->news[] = $item;
        return $this;
    }

    public function addUpdate($item)
    {
        $this->updates[] = $item;
        return $this;
    }

    public function addDelete($item)
    {
        $this->deletes[] = $item;
        return $this;
    }

    public function commit()
    {
        foreach ($this->news as $item) {
            echo 'Добавляем ' . $item . PHP_EOL;
        }

        foreach ($this->updates as $item) {
            echo 'Обновляем ' . $item . PHP_EOL;
        }

        foreach ($this->deletes as $item) {
            echo 'Удаляем ' . $item . PHP_EOL;
        }
    }
}

$work = new UnitOfWork();
$work
    ->addNew('Масла в огонь')
    ->addUpdate('Сметану')
    ->addUpdate('Иммунитет')
    ->addDelete('Болезнь')
    ->addNew('Чудесное настроени')
;

$work->commit();

// TODO: Коллекция объектов / Identity Map
// TODO: Преимущество коллекции объектов - возможность её использования в качестве кэща записей, считываемых из базы данных.
// TODO: Это избавляет от необходимости повторно обращаться к БД, если сново понадобится какой-нибудь объект.

class IdentityMap
{
    private $items = [];

    public function hasId($id)
    {
        return isset($this->items[$id]);
    }

    public function get($id)
    {
        return $this->items[$id];
    }

    public function set($id, $value)
    {
        $this->items[$id] = $value;
        return $this;
    }
}

class UserMapper
{
    private $adapter;
    private $identityMap;

    public function __construct(StorageAdapter $adapter)
    {
        $this->adapter = $adapter;
        $this->identityMap = new IdentityMap();
    }

    public function findById($id)
    {
        if ($this->identityMap->hasId($id)) {
            return $this->identityMap->get($id);
        }

        $result = $this->adapter->find($id);
        if ($result === null) {
            throw new \InvalidArgumentException('Рустам #$id не найден');
        }

        $item = $this->mapRowToUser($result);

        $this->identityMap->set($id, $item);

        return $item;
    }

    public function mapRowToUser(array $row) : User
    {
        return User::fromState($row);
    }
}




















































































