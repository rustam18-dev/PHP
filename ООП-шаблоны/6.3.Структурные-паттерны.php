<pre>
<?php

// TODO: Адаптар/Adaptar

interface SocialNetworkAuth
{
    public function auth();
    public function getUserData();
}

class VkAuth implements SocialNetworkAuth
{
    public function auth()
    {
        // Логика аавторзации ВК
    }

    public function getUserData()
    {
        // отпраляем запросы, получая данные
    }
}

class InstagramOAuth
{
    public function authByID()
    {
        //реализация
    }
    
    public function getUserID()
    {
        //
    }
    
    public function getPhotos()
    {
        
    }

    public function getUserInfo()
    {
        
    }
}

class InstagramAdapter implements SocialNetworkAuth
{
    private $adaptee;

    public function __construct()
    {
        $this->adaptee = new InstagramOAuth();
    }

    public function auth()
    {
        $this->adaptee->authByID($this->adaptee->getUserID());
    }
    public function getUserData()
    {
        $this->adaptee->getUserInfo();
    }

}


function auth(SocialNetworkAuth $provier)
{
    $provier->auth();
}

$instagram = new InstagramAdapter();
auth($instagram);

$vk = new VkAuth();
auth($vk);

// TODO: Мост / Bridge (позволяет разделить абстракцию от её реализации)

interface Formatter
{
    public function format($text) : string;
}

abstract class Service
{
    protected $formatter;

    public function __construct($formatter)
    {
        $this->formatter = $formatter;
    }

    public function setFormatter(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    abstract public function get();
}

class HtmlFormatter implements Formatter
{
    public function format($text) : string
    {
        return '<h1>' . $text . '</h1>';
    }
}

class PlainTextFormatter implements Formatter
{
    public function format($text) : string
    {
        return $text;
    }
}

class HelloWorldService extends Service
{
    public function get()
    {
        return $this->formatter->format('Hello world');
    }
}

$service = new HelloWorldService(new PlainTextFormatter());

echo $service->get() . PHP_EOL;

$service->setFormatter(new HtmlFormatter());

echo $service->get() . PHP_EOL;

// TODO: Компоновщик / Composite

interface Renderable
{
    public function render() : string;
}

class RenderableGroup implements Renderable
{
    protected $elements = [];

    public function addElement(Renderable $element)
    {
        $this->elements[] = $element;
        return $this;
    }

    public function render() : string
    {
        $result = '';
        foreach ($this->elements as $element) {
            $result .= $element->render();
        }

        return $result;
    }
}

class Form extends RenderableGroup
{
    public function render() : string
    {
        return '<form>' . parent::render() . '</form>';
    }
}

class DivGroup extends RenderableGroup
{
    public function render() : string
    {
        return '<div>' . parent::render() . '</div>';
    }
}

class InputElement implements Renderable
{
    protected $type = 'text';

    public function render() : string
    {
        return '<input type="' . $this->type . '"" />';
    }
}

class RadioInputElement extends InputElement
{
    protected $type = 'radio';
}

class FormButtonElement extends InputElement
{
    protected $type = 'submit';
}

echo (new Form())
    ->addElement(new InputElement())
    ->addElement(
        (new DivGroup())
            ->addElement(new RadioInputElement())
            ->addElement(new RadioInputElement())
    )
    ->addElement(new FormButtonElement())
    ->render()
;

// TODO: Декоратор / Decorator


interface Booking
{
    public function calculatePrice() : int;
    public function getDescription() : string;
}

abstract class BookingDecorator implements Booking
{
    protected $booking;
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}

class DoubleRoomBooking implements Booking
{
    public function calculatePrice() : int
    {
        return 40;
    }

    public function getDescription() : string
    {
        return 'номер на двоих';
    }
}

class WiFi extends BookingDecorator
{
    private const PRICE = 2;
    public function calculatePrice() : int
    {
        return $this->booking->calculatePrice() + self::PRICE;
    }

    public function getDescription() : string
    {
        return $this->booking->getDescription() .  ', есть wifi';
    }
}

class UnlimitedJuiceRefrigerator extends BookingDecorator
{
    private const PRICE = 100;

    public function calculatePrice() : int
    {
        return $this->booking->calculatePrice() + self::PRICE;
    }

    public function getDescription() : string
    {
        return $this->booking->getDescription() . ', бесконечный компот';
    }
}

class SwimmingPool extends BookingDecorator
{
    private  const PRICE  = 50;

    public function calculatePrice() : int
    {
        return $this->booking->calculatePrice() + self::PRICE;
    }

    public function getDescription() : string
    {
        return $this->booking->getDescription() . ', есть бассейн';
    }
}

$booking = new WiFi(new DoubleRoomBooking());
$booking1 = new WiFi((new UnlimitedJuiceRefrigerator(new DoubleRoomBooking())));
$booking2 = new WiFi((new SwimmingPool(new DoubleRoomBooking())));

echo $booking->getDescription() . ' всего за ' . $booking->calculatePrice() . PHP_EOL;
echo $booking1->getDescription() . ' всего за ' . $booking1->calculatePrice() . PHP_EOL;
echo $booking2->getDescription() . ' всего за ' . $booking2->calculatePrice() . PHP_EOL;

// TODO: Фасад / Facade

interface OsInterfce
{
    public function halt();
    public function getName() : string;
}

interface BiosInterface
{
    public function execute();
    public function waitForKeyPress();
    public function launc(OsInterfce $os);
    public function powerDown();
}

class Facade
{
    private $os;
    private $bios;

    public function __construct(BiosInterface $bios, OsInterfce $os)
    {
        $this->bios = $bios;
        $this->os = $os;
    }

    public function turnOn()
    {
        $this->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launc($this->os);
    }

    public function turnOff()
    {
        $this->os->halt();
        $this->bios->powerDown();
    }
}

// TODO: Заместитель / Proxy

interface Balance
{
    public function getBalance();

}

class BankAccount implements Balance
{
    public function getBalance()
    {
        sleep(2); // иммитируем запрос
        return 100;
    }
}

class BankAccountProxy extends BankAccount implements Balance
{
    protected $balance;

    public function getBalance()
    {
        if (! is_null($this->balance)) {
            return $this->balance;
        }

        return $this->balance = parent::getBalance();
    }
}


$bankAccount = new BankAccount();

echo date('H:i:s') . ' - ' . $bankAccount->getBalance() . ' - ' . date('H:i:s') . PHP_EOL;
echo date('H:i:s') . ' - ' . $bankAccount->getBalance() . ' - ' . date('H:i:s') . PHP_EOL;
echo date('H:i:s') . ' - ' . $bankAccount->getBalance() . ' - ' . date('H:i:s') . PHP_EOL;
echo date('H:i:s') . ' - ' . $bankAccount->getBalance() . ' - ' . date('H:i:s') . PHP_EOL;
echo "<br>";
$bankAccount = new BankAccountProxy();
echo date('H:i:s') . ' - ' . $bankAccount->getBalance() . ' - ' . date('H:i:s') . PHP_EOL;
echo date('H:i:s') . ' - ' . $bankAccount->getBalance() . ' - ' . date('H:i:s') . PHP_EOL;
echo date('H:i:s') . ' - ' . $bankAccount->getBalance() . ' - ' . date('H:i:s') . PHP_EOL;
echo date('H:i:s') . ' - ' . $bankAccount->getBalance() . ' - ' . date('H:i:s') . PHP_EOL;