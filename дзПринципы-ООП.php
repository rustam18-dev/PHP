<?php
class Farm
{
        public $animals = [];



    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
    }
    public function say(){
        echo "Му-му" . PHP_EOL;
    }

    public function walk(){
        echo "Тык-тык-тык". PHP_EOL;
    }

    public function sleep(){
        echo "хххпииииишшшш" . PHP_EOL;
    }


}

class Animal extends Farm
{
    public $animals;

    public function addAnimal(Animal $animal)
    {
        $this->sleep();
    }
}

class Cow extends Animal
{
 public function say()
 {
     echo "МУ-МУ_МУ_МУ-МУ" . PHP_EOL;
 }
}

class Pig extends Animal
{
    public function say()
    {
        echo "Хрю-хрю" . PHP_EOL;
    }

}
//$cow = new Cow();
//$cow->sleep();
//$cow->say();

//
//$cow = new Cow();
//$cow->walk();
//$cow->say();
//$cow->sleep();

//$pig = new Pig();
//$pig->walk();
//$pig->say();
//$pig->sleep();

class BlackBox
{
    private $data;

    public function addLog($message)
    {
        $this->data = $message;
    }

	public function getDataByEngineer(Engineer $engineer)
    {
        $this->getDataByEngineer = $engineer;
    }

}

class Plane
{
    private $blackBox;

    public function __construct(Blackbox $blackBox)
    {

    }

    public function flyProcess()
    {
        echo "Дайте разрешение на посадку";
    }

    public function crushProcess()
    {
        echo "SOS - мы падаем";
    }

    public function flyAndCrush()
    {
        $this->flyProcess();
        $this->crushProcess();
    }

    protected function addLog($message)
    {
        $this->addLog("Дайте разрешение на посадку");
        $this->addLog("SOS - мы падаем");
    }
    public function getBoxForEngineer(Engineer $engineer)
    {
        $engineer->setBox($this->blackBox);
    }
}

class Engineer
{
	public function setBox(BlackBox $blackBox)
    {

    }

	public function takeBox(Plane $plane)
    {

    }

	public function decodeBox()
    {

    }
}