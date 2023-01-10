<?php
require(__DIR__ . "/controller.php")
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Решите задачу</title>
</head>
<body>
    <h1>Решите задачу</h1>

    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" name="problem">
        <input type="hidden" value="<?= $sourceOperator1; ?>" name="op1">
        <input type="hidden" value="<?= $sourceSum; ?>" name="sum">

        <div>
            <span><?= $sourceOperator1; ?> +</span>
            <input type="text" value="<?= $sourceOperator2;?>" size="2" name="op2">
            <span> = <?= $sourceSum;?> </span>
        </div>

        <div>
            <? if(isset($equationString)): ?>
                <span><?=$equationString;?></span>
            <?endif;?>
            <? if(isset($success)):?>
                <font color="green">
                    <?=$success?>
                 </font>
            <? endif; ?>

            <? if(isset($error)):?>
                <font color="red">
                    <?=$error?>
                </font>
            <? endif;?>
        </div>

        <br>
        <input type="submit" name="solve_problem" value="Готово!">
    </form>
</body>
</html>
