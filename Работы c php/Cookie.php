<?php
/**
 * Приложение которое читает кол. просмотров страниц
 */

if (!isset($_COOKIE['countVizit'])) {
    setcookie('countVizit', 1, time()+60*60*24);
} else {
    $counter = $_COOKIE['countVizit'] + 1;
    setcookie('countVizit', $counter, time()+60*60*24);
}

echo $_COOKIE['countVizit'];