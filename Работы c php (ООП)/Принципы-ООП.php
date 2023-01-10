<?php
//class  Cat {
//    const LEGS = 4;
//}
//
//echo Cat::LEGS;
//
//
//class User{
//    public $name = "Василий";
//
//    public function getName(){
//        return $this->name;
//    }
//
//    public function  setName($name){
//        $this->name = $name;
//    }
//}
//$user = new User();
//$user->setName("Игорь");
//echo  "\n". $user->getName();
//
//$user1 = new User();
//$user1->setName("Василий");
//echo  "\n". $user1->getName();

//class User{
//    public function __construct($name, $address, $age, $surname)
//    {
//        $this->name = $name;
//        $this->address = $address;
//        $this->age = $age;
//        $this->surname = $surname;
//    }
//}
//$user = new User("Игорь", "qwe", "qwe", "ewq");
//
//echo $user->name;
//echo $user->address;
//echo $user->age;
//echo $user->surname;


//class User{
//    public  function __destruct(){
//        echo 'ПОльзователь ' . $this->getName() . ' покинул наш код';
//    }
//
//    public function getName(){
//        return $this->name;
//}
//    public function setName($name){
//        $this->name = $name;
//    }
//
//}
//$user = new User();
//$user->setName("Игорь");



//class Cook{
//    public function makeFood()
//    {
//        switch ($this->whatToCook()) {
//            case 'Candy':
//                return new Candy();
//            case 'Soup':
//                return new Soup();
//            case 'Pie':
//                return new Pie();
//        }
//    }
//
//    public function whatToCook()
//    {
//        $menu = ['Candy', 'Soup', 'Pie'];
//        $randInt = rand(0, count($menu) - 1);
//
//        return $menu[$randInt];
//    }
//}
//
//class Food
//{
//    public function eat(){
//
//    }
//}
//
//class HungryStudent
//{
//    public function eatFood(Food $food)
//    {
//        $food->eat();
//    }
//}
//
//class Candy extends Food
//{
//
//}
//
//class Soup extends Food
//{
//
//}
//
//class Pie extends Food
//{
//
//}
//
//$cook = new Cook();
//$student1 = new HungryStudent();
//$student2 = new HungryStudent();
//
//$student1->eatFood($cook->makeFood());
//$student2->eatFood($cook->makeFood());

//class Divider{
//    protected $divideTo;
//
//    public function devide(){
//        return 100 / $this->getDivideTo();
//    }
//
//    private function getDivideTo(){
//        return $this->divideTo;
//    }
//
//    public function setDivideTo($divideTo){
//        switch ($divideTo === 0){
//            case $divideTo = 1:
//                break;
//
//        }
//        $this->divideTo = $divideTo;
//    }
//}
//
//class NewDivider extends Divider {
//    public function setDivideTo($divideTo){
//        switch ($divideTo === 0){
//            case $divideTo = 100:
//                return $this->divideTo = $divideTo;
//        }
//    }
//}
//
//$divider = new NewDivider();
//
//$divider->setDivideTo(0);
//
//echo $divider->devide();

//class Pet
//{
//    public function walk()
//    {
//        echo "топ-топ-топ" . PHP_EOL;
//    }
//
//    public function sleep(){
//        echo 'zZZZZZZz' . PHP_EOL;
//    }
//
//    public function say()
//    {
//
//    }
//}
//
//class Cat extends Pet
//{
//    public function say()
//    {
//        echo "Мяу" . PHP_EOL;
//    }
//
//    public function catchMouse(){
//        echo "Кот ловит мышку" . PHP_EOL;
//    }
//}
//
//class Dog extends Pet
//{
//    public function say(){
//        echo "Гав-гав" . PHP_EOL;
//    }
//}
//
//class Horse extends Pet
//{
//    public function walk(){
//        echo "Тыгыдык-тыгыдыык" . PHP_EOL;
//    }
//
//    public function say(){
//        echo "Иго-го" . PHP_EOL;
//
//    }
//}
//
//class Tiger extends TalkativeCat{
//    public function say(){
//        echo 'Р-р-р-р-р-р' . PHP_EOL;
//    }
//
//    public function catchMouse()
//    {
//        echo "Тигр ловит мышку" . PHP_EOL;
//    }
//}
//
//class TalkativeCat extends Cat{
//    public function walk()
//    {
//        $this->say();
//        parent::walk();
//    }
//
//    public function sleep(){
//        $this->say();
//        parent::sleep();
//    }
//}
//
//
//
//
//$cat = new Cat();
//$dog = new Dog();
//$horse = new Horse();
//$tiger = new Tiger();
//$talkativeCat = new TalkativeCat();


//$talkativeCat->walk();
//$talkativeCat->sleep();

//$tiger->walk();
//$tiger->sleep();


//$cat->walk();
//$cat->say();
//$cat->sleep();
//$cat->catchMouse();


//$dog->walk();
//$dog->say();
//$dog->sleep();

//$horse->walk();
//$horse->say();
//$horse->sleep();


//class Printer
//{
//    public function print()
//    {
//
//    }
//}
//
//class SomePrinter extends Printer {}
//
//class OtherPrint extends  Printer {}
//
//function goPrint(Printer $printer)
//{
//    $printer->print();
//}
//
//goPrint(new SomePrinter());
//goPrint(new OtherPrint());


//class Reader
//{
//    public function read()
//    {
//
//    }
//}
//
//class Writer
//{
//    public function write($data)
//    {
//
//    }
//}
//
//function move(Reader $reader, Writer $writer)
//{
//    $writer->write($reader->read());
//}

class HasPrice
{
    public function getPrice()
    {
        return 0;
    }
}

class Product extends HasPrice
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class Basket extends HasPrice
{
    private $products = [];

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getPrice()
    {
        $price = 0;
        foreach ($this->products as $product)
        {
            $price += $product->getPrice();
        }

        return $price;
    }
}

class PriceFormatter
{
    public function format($value)
    {
        return $value;
    }
}

class NumberPriceFormatter extends  PriceFormatter
{
    public function format($value)
    {
        return number_format($value, 2, '.', " ");
    }
}

class HtmlNumberPriceFormatter extends  PriceFormatter
{
    public function format($value)
    {
        return '<h1>' . parent::format($value) . '</h1>';
    }
}

function formatItemPrice(HasPrice $hasPriceItem,PriceFormatter $formatter)
{
    return $formatter->format($hasPriceItem->getPrice());
}


$basket = new Basket();
$productCube = new Product("Кубик", 250000.5);
$productMatreshka = new Product('Матрёшка', 150);

$basket->addProduct($productCube);
$basket->addProduct($productMatreshka);

echo 'Первый товар ' . $productCube->getName() . ' стоит ' . formatItemPrice($productCube, new NumberPriceFormatter());
echo "<br>";
echo 'Второй товар ' . $productMatreshka->getName() . ' стоит ' . $productMatreshka->getPrice();
echo "<br>";

echo "Цена всей корзины: " . formatItemPrice($basket, new HtmlNumberPriceFormatter());