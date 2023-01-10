<?php

if(isset($_POST['owner'])){

    $login = $_POST['login'];
    $password = $_POST['password'];

    $loginStr = "4elovek";
    $passwordInt = 12345;

    if($login == $loginStr && $password == is_numeric($passwordInt)){
        $success = "Добро пожаловать!";
    } else{

        $loginStr = "";
        $passwordInt = "";
        $error = "Набран неверный логин или пароль";


    }

}