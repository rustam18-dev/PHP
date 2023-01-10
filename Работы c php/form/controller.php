<?php

// форма была заполнена и отправлена
if(isset($_POST['solve_problem'])) {

    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];
    $sum = $_POST['sum'];

    if (is_numeric($op1) && is_numeric($op2) && is_numeric($sum)) {

        $equationString = $op1 . ' + ' . $op2 . " = " . $sum; // готовим строку с уравнением (10 + 5 = 15)

        // если сумма операторов равна переданной сумме
        if($op1 + $op2 == $sum){

            $success = "Вы успешно решили задачу";
        } else{
            // если задача решена неверно
            $error = "Задача решена неверно!";
        }
    } else{
        $error = "Введены неверные данные!";
    }

}
// задача решена верно, либо не решалась вообще
if (!isset($error)){
    $sourceOperator1 = rand (0, 10);
    $sourceOperator2 = "";
    $sourceSum = rand(0, 10);
} else{
    $sourceOperator1 = $op1;
    $sourceOperator2 = $op2;
    $sourceSum = $sum;
}
