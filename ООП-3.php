<?php
class User{
    public $name = "Имя";

    function getInfo(){
        return "{$this->name}" . "{$this->surname}";
    }
}


$admin = new User();
$admin->name="Alexey ";
$admin->surname="Inanov";

echo "ПОльзователь: {$admin->getInfo()}";