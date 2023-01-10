<?php
//try {
//
//    throw new RuntimeException('Возникла какая-то ошибка', 300);
//
//
//    echo 'Ошибки не произошло' . PHP_EOL;
//}
//catch (RuntimeException $e){
//        echo 'Возникла ошибка Runtime: ' . $e->getMessage() . PHP_EOL;
//} catch (Exception $e){
//    echo 'Возникла ошибка: ' . $e->getMessage() . PHP_EOL;
//} finally {
//    echo 'Эта страка выведется всегда ' . PHP_EOL;
//}
//
//
//echo "THE END";

class BadValueException extends \InvalidArgumentException
{

}

class TooBigValueException extends BadValueException {}
class NegativeValueException extends BadValueException {}

function arithmeticOretion($a, $b)
{
    if($a < 0 || $b < 0)
    {
        throw new NegativeValueException('a < 0 || b < 0');
    }
    if($a <= $b)
    {
        throw new TooBigValueException('a <= b');
    }

    if($b == 0)
    {
        throw new \InvalidArgumentException('b == 0');
    }

    return $a / $b;
}

$values = [
  ['a' => 0, 'b' => 2],
  ['a' => -1, 'b' => -3],
  ['a' => 10, 'b' => 0],
  ['a' => 3, 'b' => 1]
];

echo '<pre>';

foreach ($values as $value) {
    try {
        try {
            echo 'a = ' . $value['a'] . ' b = ' . $value['b'] . '    ';

            $c = arithmeticOretion($value['a'], $value['b']);

            echo 'Результат: '. $c . PHP_EOL;
        } catch (BadValueException $e){
            echo 'Проблема с числами: ' . $e->getMessage() . PHP_EOL;
        }
    } catch (Exception $e){
        echo "Логируем ошибку: " . $e->getMessage() . PHP_EOL;
    }
}

echo 'The END';

echo "</pre>";