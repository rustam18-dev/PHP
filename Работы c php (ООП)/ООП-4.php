<?php
//class User {
//    public $name;
//    public $email;
//    public $password;
//    public $city;
//
//    function __construct($name, $password,$email, $city){
//        $this->name = $name;
//        $this->password = $password;
//        $this->email = $email;
//        $this->city = $city;
//    }
//
//    function getInfo(){
//        return  "{$this->name}" . "{$this->password}"  . "{$this->email}"  . "{$this->city}";
//    }
//}
//
//$user1 = new User("Rustam", "qweesadzxc", "rustam.radzabov8410@gmail.com", "Tajikistan");
//echo $user1->getInfo();

class  DestrctableClass{
    public function __construct()
    {
    print "Конструктрор";
    $this->name = "DestractableClass";
    }

    public function __destruct()
    {
        print "Уничтожение" . $this->name;
    }
}

$obj = new DestrctableClass();

