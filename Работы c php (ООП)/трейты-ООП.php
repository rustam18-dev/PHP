<?php

//trait SendMail
//{
//    public function sendMail($emil, $text)
//    {
//        echo "Отправлена письмо на почту " . $emil;
//    }
//}
//
//trait FormatPrice
//{
//    private function formatPrice($number)
//    {
//        return $number . ' rub';
//    }
//}
//
//class Order
//{
//    use SendMail;
//    use FormatPrice;
//
//    public function sendNotification($email)
//    {
//        $this->sendMail($email, 'Ваш заказ оформлен на сумму ' . $this->formatPrice('1000') . ' успешно оформлен');
//    }
//}
//
//$order = new Order();
//$order->sendNotification('rustam.radzabov8410@gmail.com');


//trait SendMail
//{
//    public function sendMail($email, $text)
//    {
//        echo 'Отправлено письмо на почту: ' . $email;
//    }
//}
//
//trait Notification
//{
//    use SendMail; // подключаем трейт
//
//    protected function needSendEmail()
//    {
//        return true;
//    }
//
//    public function notify()
//    {
//        if($this->needSendEmail())
//        {
//            $this->sendMail($this->email, 'asd');
//        }
//    }
//
//    public function toLog()
//    {
//        echo 'Лог об отправке уведомления';
//    }
//}
//
//interface Notifiable
//{
//    public function notify();
//}
//
//class Person implements Notifiable
//{
//    use Notification;
//
//    protected $email;
//
//    public function __construct($email)
//    {
//        $this->email = $email;
//    }
//}
//
//class Cat implements Notifiable
//{
//    use Notification;
//
//    protected function needSendEmail()
//    {
//        return false;
//    }
//}
//
//$person = new Person('person@mail.ru');
//$cat = new Cat();
//
//$person->notify();
//$cat->notify();

trait Logger
{
    public function toLog()
    {
        echo 'Logger - to log' . PHP_EOL;
    }
}


trait Notification
{
    public function toLog()
    {
        echo 'Лог об отправке уведомлений ';
    }
}

class Subject
{
    use Notification{
        Notification::toLog as notificationToLog;
    }
    use Logger {
        Logger::toLog as loggerToLog;
    }

    public function toLog()
    {
        $this->notificationToLog();
        $this->loggerToLog();
    }
}
$subject = new Subject();
$subject->toLog();