<?php

// __DIR__
// $_SERVER

var_dump(__DIR__ . "/var.php");
var_dump($_SERVER['DOCUMENT_ROOT'] . '/files/inc.php');
include_once 'files/var.php';


var_dump($a);

include_once $_SERVER['DOCUMENT_ROOT'] . '/files/inc.php';
include_once 'files/inc.php';

var_dump($a);