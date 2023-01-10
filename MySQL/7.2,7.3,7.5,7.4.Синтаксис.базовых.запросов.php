<pre>
<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'mydb';

$connect = mysqli_connect($host, $user, $password, $dbname);

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect,
        "select products.name as 'Название продукта', count, price, stock_id, stock.name as 'Название склада' from products left join stock on stock_id = stock.id");
//    var_export($result);
while ($row = mysqli_fetch_assoc($result)) {
    var_export($row);
}

}

mysqli_close($connect);

// select name, sum(count) from products group by name // сгруппирует все значении, то есть плюсует все одинаковые имена по количеству
// select  name, sum(count) as 'Количество' from products group by name having Количество > 30 // Фильтрация having с помощью order by
// select  name, count, price from products order by price asc // сортировка цены по возрастанию
// select  name, count, price from products order by price asc limit 4 // сортировка цены по возрастанию с лимитом 4 столбцов


// select products.name as 'Название продукта', count, price, stock_id, stock.name as 'Название склада' from products inner join stock on stock_id = stock.id // объединение данных из несколько таблиц












