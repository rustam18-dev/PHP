<?php

$result1 = [
       'author' => ["Александр", "alex.puwkin1122@gmail.com"],
       'book' => ["Золотая рыбка", "alex.puwkin1122@gmail.com1"]
];
foreach ($result1 as $result) {
    foreach ($result as $item) {
        echo "Автор " . $item;
    }

}

$result2 = [
    'author' => [
        "FIO" => [],
        "email" => []
    ],
    'book' => []
];