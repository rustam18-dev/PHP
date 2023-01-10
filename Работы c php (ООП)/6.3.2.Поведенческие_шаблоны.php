<pre>
<?php
// TODO: Цепочка ответственности / Chain of responsibility
// TODO: Колцентр
//abstract class Handler
//{
//    /**
//     * @var Handler|null
//     */
//    private $next = null;
//
//    public function link(Handler $next)
//    {
//        $this->next = $next;
//
//        return $this->next;
//    }
//
//    public function handle($request)
//    {
//        if(!is_null($this->next)) {
//            return $this->next->handle($request);
//        }
//
//        return false;
//    }
//}
//
//class Operator extends Handler
//{
//    private $name;
//
//    public function __construct($name)
//    {
//        $this->name = $name;
//    }
//
//    public function handle($request)
//    {
//        if ($this->isBusy()) {
//            echo 'Оператор ' . $this->name . ' занят' . PHP_EOL;
//
//            return parent::handle($request);
//        }
//
//        echo 'Запрос: ' . $request . ' принят оператором ' . $this->name . PHP_EOL;
//
//        return true;
//    }
//
//    private function isBusy()
//    {
//        return (bool)rand(0, 4);
//    }
//}
//
//class BusyHandler extends Handler
//{
//    private $request = null;
//
//    public function handle($request)
//    {
//       if ($this->request == $request) {
//           echo 'Все операторы заняты' . PHP_EOL;
//
//           return false;
//       }
//
//       $this->request = $request;
//
//       if ($result = parent::handle($request)) {
//
//           return $result;
//       }
//    }
//}
//
//
//$busyHandler = new BusyHandler();
//$busyHandler
//    ->link(new Operator('#1'))
//    ->link(new Operator('#2'))
//    ->link(new Operator('#3'))
//    ->link($busyHandler);
//
//for ($i = 0; $i < 3; $i++) {
//    $result = $busyHandler->handle('request ' . $i);
//
//    if (!$result) {
//        echo 'Запрос передан на уровень выше' . PHP_EOL;
//    }
//}
//
//// TODO: Команда / Command
//// TODO: Архитектура паттерна (выявление лого)
//
//interface CommandInterface
//{
//    public function execute();
//}
//
//class Invoker
//{
//    /**
//     * @var CommandInterface
//     */
//    private $command;
//
//    public function setCommand(CommandInterface $cmd)
//    {
//        $this->command = $cmd;
//    }
//
//    public function run(){
//        $this->command->execute();
//    }
//}
//
//class Receiver
//{
//    private $enabledDate = false;
//    private $output = [];
//
//    public function write(string $str)
//    {
//        if ($this->enabledDate) {
//            $str .= '['. date('Y-m-d H:i:s') . ']';
//        }
//
//        $this->output[] = $str;
//    }
//
//    public function getOutput()
//    {
//        return join("\n", $this->output);
//    }
//
//    public function enableDate()
//    {
//        $this->enabledDate = true;
//    }
//
//    public function disableDate()
//    {
//        $this->enabledDate = false;
//    }
//}
//
//class HelloCommand implements CommandInterface
//{
//    /**
//     * @var Receive
//     */
//    private  $output;
//
//    public function __construct(Receiver $console)
//    {
//        $this->output = $console;
//    }
//
//    public function execute()
//    {
//        $this->output->write('Hello world');
//    }
//}
//
//class AddMessageDateCommand implements CommandInterface
//{
//    /**
//     * @var Receiver
//     */
//    private $output;
//
//    public function __construct(Receiver $console)
//    {
//        $this->output = $console;
//    }
//
//    public function execute()
//    {
//        $this->output->enableDate();
//    }
//
//    public function undo()
//    {
//        $this->output->disableDate();
//    }
//}
//
//$invoker = new Invoker();
//$reciever = new Receiver();
//
//$invoker->setCommand(new HelloCommand($reciever));
//$invoker->run();
//
//echo $reciever->getOutput() . PHP_EOL;
//echo '####################' . PHP_EOL;
//
//
//$messageDateCommand = new AddMessageDateCommand($reciever);
//$messageDateCommand->execute();
//$invoker->run();
//
//echo $reciever->getOutput() . PHP_EOL;
//
//echo '####################' . PHP_EOL;
//
//
//$messageDateCommand->undo() . PHP_EOL;
//$invoker->run();
//
//echo $reciever->getOutput() . PHP_EOL;

// TODO:  Посредник / Mediator

interface MediatorInterface
{
    public function makeRequest();
    public function sendResponse($content);
    public function loadData();
}

abstract class Colleague
{
    /**
     * @var MediatorInterface
     */
    protected $mediator;

    public function setMediator(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }
}

class Client extends Colleague
{
    public function output($content)
    {
        echo $content . PHP_EOL;
    }

    public function request()
    {
        $this->mediator->makeRequest();
    }
}

class Server extends Colleague
{
    public function proccess()
    {
        $data = $this->mediator->loadData();
        $this->mediator->sendResponse("Hello " . $data);
    }
}

class Database extends Colleague
{
    public function getData()
    {
        return 'World';
    }
}

class Mediator implements MediatorInterface
{
    private $storage;
    private $client;
    private $server;

    public function __construct(DataBase $storage, Client $client, Server $server)
    {
        $this->storage = $storage;
        $this->client = $client;
        $this->server = $server;

        $this->storage->setMediator($this);
        $this->client->setMediator($this);
        $this->server->setMediator($this);

    }

    public function makeRequest()
    {
        $this->server->proccess();
    }

    public function sendResponse($content)
    {
        $this->client->output($content);

    }

    public function loadData()
    {
       return $this->storage->getData();
    }
}

$client = new Client();
new Mediator(new Database(), $client, new  Server());

$client->request();

// TODO: Наблюдатель / Observer
// TODO: при изменении emaila отправить тот самый новый email

interface Observer
{
    public function  update($subject);
}

abstract class Subject
{
    protected $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(Observer $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(Observer $observer)
    {
        $this->observers->detach($observer);
    }

    protected function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class User extends Subject
{
    private $email;

    public function getEmail()
    {
        return $this->email;
    }

    public function changeEmail($email)
    {
        $this->email = $email;
        $this->notify();
    }
}

class UserEmailObserver implements Observer
{
    public function update($subject)
    {
        echo 'Обновлены данные пользователя, посылаем уведомление на ' . $subject->getEmail() . PHP_EOL;
    }
}

$user = new User();
$user->attach(new UserEmailObserver());

$user->changeEmail("new_email@gmail.com");