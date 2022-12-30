<?php
class User
{
//    public $name;
//    public $email;
//    public $password;
//    public $city;
//
//    public function getName()
//    {
//        echo $this->name;
//        $this->test();
//    }
//    public function test(){
//        echo "Test";

private  static $name;

    public static function setName($name1)
    {
        self::$name = $name1;
    }
    public  static function getName(){
        return self::$name;
    }

}
User::setName('Ivan');
echo User::getName();

//$user1 = new User();
//$user1->name="Alexey";
//$user1->getName();
//
//$user2 = new User();
//$user2->name="Ivan";
//$user2->getName();

