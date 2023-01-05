<?php


interface Walkable
{
    public function walk();
}

interface Sleepable
{
     function sleep(int $seconds);
}

interface Animal extends Walkable, Sleepable
{
    public function say();
}


class Cat implements Animal
{
    public function walk()
    {
       echo "топ-топ-топ" . PHP_EOL;
    }

    public function sleep(int $seconds)
    {
        echo "Котик уснул на " . $seconds . ' секунд'. PHP_EOL;
    }

    public function say()
    {
        echo "Мяу" . PHP_EOL;
    }
}

class Human implements Walkable
{
    public function walk()
    {
        echo "топ-топ-топ" . PHP_EOL;
    }

}

function goForAWalk(Walkable $walkable)
{
    $walkable->walk();

}

$cat = new Cat();
$human = new Human();

goForAWalk($cat);
goForAWalk($human);
