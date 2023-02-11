<?php

namespace App;

class SimplePriceFormatter implements PriceFormatter
{
    public function format($value)
    {
        return $value . ' руб';
    }
}