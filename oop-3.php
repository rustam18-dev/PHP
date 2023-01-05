<?php
//class Account
//{
//    protected $id;
//    protected $balance;
//    protected $annualInterestRate;
//    protected $dateCreated;
//
//    public function __construct($id, $balance, $annualInterestRate)
//    {
//        $this->id = $id;
//        $this->balance  = $balance;
//        $this->annualInterestRate = $annualInterestRate;
//        $this->dateCreated = date('Y.m.d H:i:s');
//    }
//
//    public function getMonthlyInterestRate() : string
//    {
//        return $this->annualInterestRate / 12;
//    }
//
//    public function withDraw($num)
//    {
//        return $this->balance -= $num;
//    }
//
//    public function deposit($num)
//    {
//        return $this->balance += $num;
//    }
//
//}
//
//$account = new Account(1122, 20000, 4.5);
//echo "<br>" . $account->getMonthlyInterestRate();
//echo  "<br>" . $account->withDraw(2500);
//echo  "<br>" .  $account->deposit(3000);

class Course
{
    protected string $name;
    protected $students = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addStudent($ID = [])
    {

    }

    public function removeStudent()
    {

    }

    public function getNumberOfStudents()
    {

    }

}

class Student
{
    protected int $id;
    protected string $name;
}
