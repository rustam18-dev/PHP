<?php
abstract class Food
{
    protected $name;

    public function __construct($name)
    {
        $this->name =$name;
    }

    public function getName()
    {
        return $this->name;
    }

    abstract public function getReceipt();
    abstract public function getIngredientsCount();
}

class Chocolate extends Food
{
    public function getReceipt()
    {
        return 'Какао  и молоко';
    }

    public function getIngredientsCount(){
        return  2;
    }
}

class BakedApple extends Food
{
    private $ingredients = ['яблоко'];

    public function __construct()
    {
        parent::__construct('Печённое яблоко');
    }

    public function getReceipt()
    {
        return implode(',', $this->ingredients);
    }

    public function getIngredientsCount()
    {
       return count($this->ingredients);
    }
}

function describeFood(Food $food)
{
    echo 'Чтобы приготовить ' . $food->getName() . ' нам ' .
        ($food->getIngredientsCount() > 1 ? 'понадобятся: ' : 'понадобится ') .
        $food->getReceipt();
}

$chocolate = new Chocolate('Alpen Gold');
$apple = new BakedApple();

describeFood($apple);