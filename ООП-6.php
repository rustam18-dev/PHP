<?php
//class User {
//    public $name;
//    public $email;
//    public $password;
//    public $city;
//
//    function __construct($name, $password,$email, $city)
//    {
//        $this->name = $name;
//        $this->password = $password;
//        $this->email = $email;
//        $this->city = $city;
//    }
//
//    function getInfo(){
//        $information =   "{$this->name}" . "{$this->password}"  . "{$this->email}"  . "{$this->city}";
//        return $information;
//    }
//}
//
//$user1 = new User("Rustam", "qweesadzxc", "rustam.radzabov8410@gmail.com", "Tajikistan");
//echo $user1->getInfo();
//
//class  Moderator extends User{
//    public $info;
//    public $rights;
//
//    public function __construct($name, $password, $email, $city, $info, $rights)
//    {
//        parent::__construct($name, $password, $email, $city);
//        $this->info = $info;
//        $this->rights = $rights;
//    }
//    function getInfo(){
//        $information = parent::getInfo();
//        $information =   "{$this->info}" . "{$this->rights}" ;
//        return $information;
//    }
//}
//$moder = new Moderator("Rustam", "rustam123", "rustam8410@gmail.com", "Kkujand", "Moderator", "True");
//
//echo $moder->getInfo();

class Test{
    protected $info;

}
class Test2 extends  Test{
    public function test(){
        $this->info = "info";
        echo $this->info;
    }
}

$test2 = new Test2();
$test2->test();
//$test2->info = "information";
//Наследования
//Инкапцуляция
//полиморфизм
//Основные принципы ооп