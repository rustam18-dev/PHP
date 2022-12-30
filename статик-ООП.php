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
//    public  function describeZoo()
//    {
//        echo "В зоопарке " . self::getName() . ' находится ' . ' животных';
//    }
//
//    public function getName()
//    {
//        return $this->name;
//    }
//}
//$zoo = new Zoo("Московский");
//$schoolZoom = new Zoo('Школьный');
//$zoo->addAnimal();
//
//echo $schoolZoom->getAnimalsCount();

//class BaseTimer
//{
//    public static $time = 0;
//
//    public function tic()
//    {
//        static::$time++;
//    }
//
//    public static function getTime()
//    {
//        return static::$time;
//    }
//}
//
//class TimerA extends BaseTimer
//{
//    public static $time = 0; // Переобределение
//}
//
//class TimerB extends BaseTimer
//{
//
//}
//
//
//$timerA = new TimerA();
//$timerB = new TimerB();
//
//$timerA->tic();
//$timerB->tic();
//
//
//echo $timerA->getTime() . PHP_EOL;
//echo $timerB->getTime() . PHP_EOL;
//echo BaseTimer::getTime() . PHP_EOL;


class Order
{
    public $status;

    const STATUS_CREATED = 'created';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_DONE = 'done';

    protected static $statuses = [
        self::STATUS_CREATED,
        self::STATUS_CANCELLED,
        self::STATUS_DONE
    ];

    public  function isDone()
    {
        return $this->getStatus() === self::STATUS_DONE;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public static function getDoneStatus()
    {
        return self::STATUS_DONE;
    }

    public static function getStatuses()
    {
//        return self::$statuses;
    }
}
?>

<select>
    <?php foreach (Order::getStatuses() as $status) :?>
        <option><?=$status?></option>
    <?php endforeach?>
</select>

<?php
class Time
{
    private $hours;
    private $minutes;

    public function __construct($hours, $minutes)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    public static function fromString($value)
    {
        list($hours, $minutes) = explode($value, ':');

        return new self($hours, $minutes);

    }

    public static function midnight()
    {
        return new self(0, 0);
    }

}

$time = Time::fromString('11:55');
$midnightTime = Time::midnight();
$anotherTime = new Time(11,55);
