<?php
// цикл  с предусловием (while)

//$i = 10;
//echo "Цикл с предусловием условием ";
//while ($i < 10){
//    echo "$i ";
//    $i++;
//}

// цикл с пост условием do-while

//$i = 10;
//echo "Цикл с пост условием ";
//do{
//    echo "$i ";
//
//    $i++;
// } while($i < 10);


// цикл со счётчиком for


//for($i = 0; $i < 10; $i++){
//        if($i % 2 == 0){
//            echo "$i ";
//        }
//}

//for ($i = 0; $i < 10; $i += 2){
//    echo "$i ";
//}


// цикл для перебора массивов - foreach


//$a = [1, 2, 'три', 1.5];
//
//foreach ($a as $value){
//    echo $value . ", ";
//}
//
//$a = [1, 2, 'три', 1.5];
//
//foreach ($a as $key => $value){
//    var_dump('key: ' . $key . ', value: ' . $value);
//}

// приведеие строки к числу

//var_dump((int)"10"); // 10
//var_dump((int)"10asd"); // 10
//var_dump((int)"10asd10"); // 10
//var_dump((int)"-10"); // -10
//var_dump((int)"-10asd"); //-10
//var_dump((int)"-asd10"); // 0
//var_dump((int)"0asd15"); // 0
//
//var_dump((float)"1.5asd"); // 1.5
//var_dump((float)"-1.5asde1.2"); // -1.5
//var_dump((float)"-.dasda3213"); // 0
//var_dump((float)".4#ddmaspd"); // 0.4
//var_dump((float)"1,5sd123"); // 1
//var_dump((float)"1.5e10"); // 1.5 * 10^10

// арифметические операции с числом и строкой

//var_dump("10" + 10);
//var_dump("10" + "10");
//var_dump("10" + "20dollar");
//var_dump("10кошек"+"10собак");



// приведение к boolean

// false
// int - 0
// float - 0.0
// string - "0"
// array []
// NULL
// SimpleXML


//var_dump((bool)10); // 1
//var_dump((bool)"10"); // 1
//var_dump((bool)""); // 0
//var_dump((bool)" "); // 1
//var_dump((bool)[]); // 0
//var_dump((bool)[false]); // 1
//var_dump((bool)[null]); // 1
//var_dump((bool)null); // 0


//$a = [1, 2];
////$b = ["key1" => 3, "key2" => 4];
//$b = [3, 4, 5, 6];
//var_dump($a + $b);

// $a+$b
// $a == $b
// $a === $b
// $a != $b
// $a !== $b

//var_dump((array)10); // [10]
//var_dump((array)false); // [false]
//var_dump((array)[1, 2]); // [1, 2]

// ==

// false == []
// null == []
//  [] == []

//var_dump((int)"10");
//var_dump((float)10);
//
//var_dump((float)10);
//var_dump((double)10);
//
//$a = 10;
//intval("10"); // (int)"10"
//floatval(10); // (float)10
//strval(10); // (string)10
//settype($a, 'string'); // (string)10











