<?php

namespace App\Service;

class Pushall
{
    private $apiKey;
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}