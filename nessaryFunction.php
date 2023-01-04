<?php


// TODO: проверка типа переменной

//is_array();
//is_bool();
//
//is_float();
//is_double();
//
//is_int();
//is_integer();
//is_long();
//
//is_null();
//
//is_object();
//
//is_scalar();
//
//is_string();
//
//$a = 10;
//$b = null;
//
//isset($a); // true
//isset($b); // false
//isset($c); // false
//
//empty() //!isset($var) || $var == false
//
//empty([]) // true
//empty($c); // true
//empty(""); // true
//empty("0") // true
//empty(0); // true
//empty(-1) // false


// TODO: для работы с массивами
//$arr = [
//  "key1"  => "value1",
//  "key2"  => 30
//];
//
//count($arr); // количество элементов массива
//array_pop($arr); // извлекает последний элемент массива
//array_shift($arr); // извлекает первый элемент массива
//array_push($arr, 30); // добавляет в конец массива
//array_unshift($arr, "value1"); // добавляет в начало массива
//array_keys($arr); // выводит все ключи массива
//array_values($arr); // выводит все значении массива
//in_array("value1", $arr); // проверяет есть ли значение "value1" в массиве $arr
//array_key_exists("key1", $arr) // проверяет есть ли ключ "key1" в массиве $arr
//array_unique($arr); // выводит все уникальные значение из массива


// TODO: МАТЕМАТИЧЕСКИЕ ФУНКЦИИ:
//abs(-10); // 10
//abs(0); // 0
//abs(10); // 0
//
//cos(5);
//sin(0.5);
//log(0.5);
//pi(); // 3.14159
//M_PI; // 3.14159
//
//floor(2.56); // 2
//floor( 3.999); // 3
//floor(-3.2); // -4
//
//ceil(2.56) // 3
//ceil(3.999) // 4
//ceil(-3.2) // 3
//
//round(4.5) // 5
//round(4.4) // 4
//
//round(4.5378, 2) // 4.54
//round(4.5333, 1) // 4.5
//
//max(1, 2, 3, 4, 5); // 5
//max([1,2,3,4,5]) // 5
//
//min(1,2,3,4,5) // 1
//min([1,2,3,5,6]) // 1
//
//pow(4,2) // 16
//pow(4, -2) // 1/16
//pow(2, -2) // 0.25
//
//4 ** 2 // 16
//
//rand(0, 10) // от 0 до 10 (случайное число)

// TODO: СТРОКИ

//$myStr = "Hello, functions!";
//
//strlen($myStr); // длина строки 17
//explode(' ', $myStr); // возвращает массив по разделённому значению [["Hello,", "functions!"]]
//implode("*", $myStr); // Hello,*functions!
//htmlspecialchars("<a href='ya.ru'>yandex</a>"); // безопастность при работе с инптом
//
//md5("abs"); // хэширование
//
//trim("           hello          "); // очищает пробелы и некоторые символы c начало и конца строк
//ltrim("       hello"); // очищает пробелы и некоторые символы c начало строк
//rtrim("hello             "); // очищает пробелы и некоторые символы c конца строк
//
//
//substr("abcdef", 2) // cdef
//substr("abcdef", 2, 3) //cde  (2-ой аргумент - количесто букв в элементе, 3-ий аргумент - длина строк)
//substr("abcdef", -2) // счёт идёт с конца строки ef
//substr("abcdef", -2, 1) // e
//substr("abcdef", 2, -2) // cd
//
//substr("abcdef", 4, -4); // false

// TODO: ДАТА И ВРЕМЯ

//var_dump(time()); // количество секунд прошедших с начала Unix эпохи 1 янаря 1970 года
//var_dump(date('Y-m-d-D H:i:s')) ; // форматирует дату























