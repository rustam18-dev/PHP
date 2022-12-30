<?php
class classes{
    public $student;
    public $age;

    function set_student($student){
        $this->student = $student;
    }
    function get_student(){
        return $this->student;
    }

    function set_age($age){
        $this->age = $age;
    }
    function get_age(){
        return $this->age;
    }
}

$student = new classes();
$student->set_student('Шегоз');
echo $student->get_student() . "<br>";

$age = new classes();
$age->set_age(18);
echo $age->get_age();




