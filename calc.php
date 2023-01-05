<?php
class Calculator
{
    public $Mycalc;

    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function add()
    {
        return $this->num1 + $this->num2;
    }

    public function minus()
    {
        return $this->num1 - $this->num2;
    }

    public function multiple()
    {
        return $this->num1 * $this->num2;
    }

    public function divide()
    {
        return $this->num1 / $this->num2;
    }
}

$mycalc = new Calculator(18, 2);

echo $mycalc->add() . "<br>";
echo $mycalc->minus()  . "<br>";
echo $mycalc->multiple() . "<br>";
echo $mycalc->divide()  . "<br>";

class KvadratnoeUravnenie
{

    protected $a;
    protected $b;
    protected $c;

    public function __construct($a, $b, $c)
    {
        $discriminant =  ($b*$b) - (4*$a*$c);
        if ($discriminant < 0)
        {
            echo "Квадратное уравнение не имеет корней";
        }
        else{
            if ($discriminant == 0)
            {
                $a = -$b / (2 * $a);
                $b = $a;
            } else
            {
                $a = (-$b + sqrt($discriminant)) / (2 * $a);
                $b = (-$b - sqrt($discriminant)) / (2 * $a);
            }

            echo "<br>" . $a . "<br>" . $b;
        }
    }

}

//$Disck = new KvadratnoeUravnenie(4, 2, -2);


//class HasPrice
//{
//    public function getPrice()
//    {
//        return 0;
//    }
//}
//
//class Product extends HasPrice
//{
//    private $name;
//    private $price;
//
//    public function __construct($name, $price)
//    {
//        $this->name = $name;
//        $this->price = $price;
//    }
//
//    public function getName(){
//        return $this->name;
//    }
//
//    public function getPrice()
//    {
//        return $this->price;
//    }
//}
//
//class Basket extends HasPrice
//{
//    private $products = [];
//
//    public function addProduct(Product $product)
//    {
//        $this->products[] = $product;
//    }
//
//    public function getPrice()
//    {
//        $price = 0;
//        foreach ($this->products as $product)
//        {
//            $price += $product->getPrice();
//        }
//
//        return $price;
//    }
//}
//
//$basket = new Basket();
//$productCube = new Product("Нон", 2.5);
//$productMatreshka = new Product('Шакар', 10);
//
//$basket->addProduct($productCube);
//$basket->addProduct($productMatreshka);
//
//echo "<br>";
//echo "<br>";
//echo  $productCube->getName() . ' стоит ' . $productCube->getPrice();
//echo "<br>";
//echo $productMatreshka->getName() . ' стоит ' . $productMatreshka->getPrice();
//echo "<br>";
//
//echo "Цена всей корзины: " . $basket->getPrice();



?>
<pre>
    <?php
class ShoppingCart
{
    public $product = [];


    public function addProduct($product)
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

class Product {
    public $name;
    public $price;

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
    public function printRepeit()
    {
      return $this->name . $this->price;
    }
}

$ShoppingCart = new ShoppingCart();
$ShoppingCart = new Product("Нон  = ", 2.5);
$ShoppingCart = new Product("Шакар =  ", 12.5);

echo  $ShoppingCart->printRepeit();
echo  $ShoppingCart->printRepeit();
echo "<br>";
echo $ShoppingCart->getPrice();

?>
    </pre>

