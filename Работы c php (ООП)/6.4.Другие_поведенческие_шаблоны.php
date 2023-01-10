<pre>
<?php
// TODO: Интерпретатор / Interpreter
//
//class Product
//{
//    private $name;
//    private $price;
//
//    public function __construct($name, $price)
//    {
//        $this->name = $name;
//        $this->price = $price;
//    }
//
//    public function describe()
//    {
//        return $this->getName() . ': ' . number_format($this->getPrice(), 2, '.', '') . ' руб.';
//    }
//
//    public function getName()
//    {
//        return $this->name;
//    }
//
//    public function getPrice()
//    {
//        return $this->price;
//    }
//}
//
//class Basket implements \Iterator
//{
//    private $products = [];
//    private $currentIndex = 0;
//
//    public function addProduct(Product $product)
//    {
//        $this->products[] = $product;
//    }
//
//    public function getPrice()
//    {
//        $this->rewind();
//        $price = 0.0;
//
//        foreach ($this as $product) {
//            $price += $product->getPrice();
//        }
//
//        return $price;
//    }
//
//    public function current(): Product
//    {
//        return  $this->products[$this->currentIndex];
//    }
//
//    public function key(): int
//    {
//        return $this->currentIndex;
//    }
//
//    public function next()
//    {
//        return $this->currentIndex++;
//    }
//
//    public function rewind()
//    {
//        $this->currentIndex = 0;
//    }
//
//    public function valid() : bool
//    {
//        return isset($this->products[$this->currentIndex]);
//    }
//}
//
//$basket = new Basket();
//$basket->addProduct(new Product('Коляска', 10000));
//$basket->addProduct(new Product('Магнитик', 9.99));
//$basket->addProduct(new Product('Автомобиль', 2000000));
//
//foreach ($basket as $product) {
//
//    echo $product->describe() . PHP_EOL;
//}
//
//echo 'Итого ' . $basket->getPrice() . PHP_EOL;

// TODO: Хранитель / Memento
// TODO: Система работает с обращениями пользователя обращение могу быть двух статусов: открытой и закрытой,
// TODO: у оператора меняющего обращения должны быть возможность откатить последнее изменение

//class State
//{
//    const STATE_OPENED = 'opened';
//    const STATE_CLOSED = 'closed';
//
//    private $state;
//
//    public function __construct(string $state)
//    {
//        $this->state = $state;
//    }
//
//    public function __toString(): string
//    {
//        return $this->state;
//    }
//}
//
//class Memento
//{
//    private $state;
//
//    public function __construct(State $stateToSave)
//    {
//        $this->state = $stateToSave;
//    }
//
//    public function getState()
//    {
//        return $this->state;
//    }
//}
//
//class Ticket
//{
//    private $currentState;
//
//    public function __construct()
//    {
//        $this->currentState = new State(State::STATE_OPENED);
//    }
//
//    public function open()
//    {
//        $this->currentState = new State(State::STATE_OPENED);
//    }
//
//    public function close()
//    {
//        $this->currentState = new State(State::STATE_CLOSED);
//    }
//
//    public function saveToMemento() : Memento
//    {
//        return new Memento(clone $this->currentState);
//    }
//
//    public function restoreFromMemento(Memento $memento)
//    {
//        $this->currentState = $memento->getState();
//    }
//
//    public function getState() : State
//    {
//        return $this->currentState;
//    }
//}
//
//$ticket = new Ticket();
//
//$ticket->open();
//echo $ticket->getState() . PHP_EOL;
//
//$memento = $ticket->saveToMemento();
//
//$ticket->close();
//echo $ticket->getState() . PHP_EOL;
//
//$ticket->restoreFromMemento($memento);
//
//echo $ticket->getState() . PHP_EOL;

// TODO: Состояния / State
// TODO: Процесс обратботки заказа в магазине, при обработке в магазине оно создаётся, затем его доставляют и вводит статус "выполнен".

//interface State
//{
//    public function proceedToNext(OrderContext $context);
//    public function toString() : string;
//}
//
//class StateCreated implements State
//{
//    public function proceedToNext(OrderContext $context)
//    {
//        $context->setState(new StateShipped());
//    }
//
//    public function toString() : string
//    {
//        return 'created';
//    }
//}
//
//class StateShipped implements State
//{
//    public function proceedToNext(OrderContext $context)
//    {
//        $context->setState(new StateDone());
//    }
//
//    public function toString() : string
//    {
//        return 'shipped';
//    }
//}
//
//class StateDone implements State
//{
//    public function proceedToNext(OrderContext $context)
//    {
//
//    }
//
//    public function toString() : string
//    {
//        return 'done';
//    }
//}
//
//class OrderContext
//{
//    /**
//     * @var State
//     */
//    private $state;
//
//    public static function cleate() : OrderContext
//    {
//        $order = new self();
//        $order->state = new StateCreated();
//
//        return $order;
//    }
//
//    public function setState(State $state)
//    {
//        $this->state = $state;
//    }
//
//    public function proceedToNext()
//    {
//        $this->state->proceedToNext($this);
//    }
//
//    public function toString()
//    {
//        return $this->state->toString();
//    }
//}
//
//$order = OrderContext::cleate();
//echo $order->toString() . PHP_EOL;
//
//$order->proceedToNext();
//echo $order->toString() . PHP_EOL;
//
//$order->proceedToNext();
//echo $order->toString() . PHP_EOL;
//
//$order->proceedToNext();
//echo $order->toString() . PHP_EOL;


// TODO: Стратегия / Strategy
// TODO: В нашей системе можно оплачивать разными способами, нужно просто реализовать

//interface PaymentStrategy
//{
//    public function pay($amount);
//}
//
//class Order
//{
//    private $amount;
//
//    public function __construct($amount)
//    {
//        $this->amount = $amount;
//    }
//
//    public function pay(PaymentStrategy $strategy)
//    {
//        $strategy->pay($this->amount);
//    }
//}
//
//class DusanbeCity implements PaymentStrategy
//{
//    public function pay($amount)
//    {
//        echo 'Оплата через Душанбе Сити, сумма к оплате: ' . $amount . PHP_EOL;
//    }
//}
//// Оплата с внутреннего счёта клиента
//class InnerAccountPayment implements PaymentStrategy
//{
//    public function pay($amount)
//    {
//        echo 'Списываем с внутренного счёта: ' . $amount . PHP_EOL;
//    }
//}
//
//$order = new Order(100);
//$order->pay(rand(0, 1) ? new DusanbeCity() : new InnerAccountPayment());

// TODO: Шаблонный метод / Template Method
// TODO: Отпуск. Мы можем поехать в море или куда-нибудь

abstract class Journey
{
    private $thingsToDO = [];

    final public function takeATrip()
    {
        //Покумаем билет на самолёт
        $this->thingsToDO[] = $this->buyAFlight();
        // нам нужно долететь до самого место
        $this->thingsToDO[] = $this->takePlane();
        // нужно насладиться отпуском
        $this->thingsToDO[] = $this->enjoyVacation();

        //затем нужно купить сувинир
        $buyGift = $this->buyGift();

        // если не забыли сувиниры
        if ($buyGift !== null) {
            $this->thingsToDO[] = $buyGift;
        }

        // затем на нужно вернуться на самолёте
        $this->thingsToDO[] = $this->takePlane();
    }

    abstract protected function enjoyVacation() : string;

    protected function buyGift()
    {
        return null;
    }

    private function buyAFlight() : string
    {
        return 'Покупаем билеты на самолёт';
    }

    private function takePlane() : string
    {
        return 'Летим на самолёте';
    }

    public function getThingsToDo() : array
    {
        return $this->thingsToDO;
    }
}

class CityJourney extends Journey
{
    protected function enjoyVacation() : string
    {
        return 'Кушать, пить компот, спать до обеда, наделать фото в известных местах';
    }

    protected function buyGift() : string
    {
        return 'Купить магнитик';
    }
}

class BeachJourney extends Journey
{
    protected function enjoyVacation() : string
    {
        return 'Купаться и валяться на пляже';
    }
}

$journey = rand(0, 1) ? new BeachJourney() : new CityJourney();
$journey->takeATrip();

foreach ($journey->getThingsToDo() as $item) {
    echo $item . PHP_EOL;
}

// TODO: Посетитель / Visitor


























































































































