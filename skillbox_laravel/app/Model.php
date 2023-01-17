<?php

namespace App;


class Model extends \Illuminate\Database\Eloquent\Model
{
    public $guarded = []; //ставить защиту от массовой заполнение полей (текущее значение означает, что массив защищён)
}