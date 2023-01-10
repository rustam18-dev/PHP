<?php
require_once("Authorization.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Авторизация</h1>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST" name="Authonrization">
    <label> Логин:
        <input type="text" value="<?if(isset($loginArr)):?> <?=$loginStr?> <? endif;?>" name="login">
    </label>
    <br>
    <br>
    <label> Пароль:
    <input type="text" value="<?if(isset($passwordArr)):?> <?=$passwordInt?> <? endif;?>" name="password">
    </label>

    <br>
    <br>
    <div>
        <span>
            <? if(isset($success)):?>
            <font color="green">
                <?=$success?>
            </font>
            <? endif;?>
        </span>
        <span>
            <? if(isset($error)):?>
                <font color="red">
                    <?=$error?>
                </font>
            <? endif;?>
        </span>
    </div>
    <input type="submit" name="owner">

</form>
</body>
</html>