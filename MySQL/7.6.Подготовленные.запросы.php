<pre>
<?php
$user = 'root';
$password = '';
$dsn = 'mysql:host=localhost;dbname=mydb';

// Устанавливае подключение к серверу базы данных
$pdo = new PDO($dsn, $user, $password);
$stmt = $pdo->prepare('insert into stock (name) values (:name)');

// Выводим
//$stmt = $pdo->query('select * from stock');


// Выполняем запрос
$stmt->execute([':name' => 'склад 1']);

// Выводим
//while ($row = $stmt->fetch()) {
//    echo $row['name'] . "<br>";
//}


// Закрываем подключение к серверу БД
$pdo = null;
