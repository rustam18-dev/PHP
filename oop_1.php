<?php
//class Fruit{
//    public $name;
//    public $color;
//    public $weight;
//
//
//    function set_name($name){
//        $this->name = $name;
//    }
//    function get_name(){
//        return $this->name;
//    }
//    function set_color($color){
//        $this->color = $color;
//    }
//    function get_color(){
//        return $this->color;
//    }
//    function set_weight($kg){
//        return $this->weight = $kg;
//    }
//    function get_weight(){
//        return $this->weight;
//    }
//
//
//
//}
//
//$weight = new Fruit();
//$weight->set_weight('50kg');
//
//
//$apple = new Fruit();
//$apple->set_name('Apple');
//$apple->set_color('Red');
//
//$banana = new Fruit();
//$banana->set_name('Banana');
//$banana->set_color('Yellow');
//
//
//class Cars {
//    public $marka;
//    public $color;
//
//    function set_marka($marka){
//        $this->marka = $marka;
//    }
//    function get_marka(){
//        return $this->marka;
//    }
//    function set_color($color){
//        $this->color = $color;
//    }
//    function get_color(){
//        return $this->color;
//    }
//}
//
//$marka =  new Cars();
//$marka->set_marka('audio');
//
//$color = new Cars();
//$color->set_color('Red');

//echo $color->get_color() . "\n";
//echo $marka->get_marka();

//class City
//    public $country;
//    public $color;
//    public $weight;
//
//    function set_country($country){
//        $this->country = $country;
//    }
//    function get_country(){
//        return $this->country;
//    }
//
//    protected function set_color($color){
//        $this->color = $color;
//    }
//}
//
//$country = new City();
//$country->set_country('Худжанд');
//
//
//echo $country->get_country();
//

//class City{
//    public $country;
//
//    public function __construct(){
//    }
//}

class Fruit{
    public  $name;
    public function __construct($name, $color){
        $this->name = $name;
        $this->color = $color;
    }
    public function intro(){
        echo "The fruit is {$this->name} and the color is {$this->color}";
    }
}

class Strawberry extends Fruit{
    public function message(){
        echo "Am I a fruit or a berry ";
    }
}

$strawberry = new Strawberry("Strawberry", "red");
$strawberry->message();
$strawberry->intro();


