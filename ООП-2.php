<?php

class User{
    public $name = "Имя";
    public $password = "Пароль";
    public $email = "Емейл";
    public $city  = "Город";

}
$admin = new User();
$user1 = new User();
$admin->name="Alexey";
$user1->name="Andrey";


echo $admin->name;
echo $user1->name;


$user1->surname = "Ivanov";
echo $user1->surname;
