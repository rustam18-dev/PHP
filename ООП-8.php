<?php
class user{
    public static $name;

    public static function hello(){
//        echo "Hello ".self::$name . " ";
        echo "Hello ";
        return self::$name;
    }

}
user::$name="Alexey";
echo user::$name;
//user::hello();
echo user::hello();