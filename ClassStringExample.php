<?php

require __DIR__ . '/vendor/autoload.php';

use \Darling\PHPTextTypes\classes\strings\ClassString;

$obj = (object) array('propertyName' => 'value');

$classString = new ClassString($obj);

echo $classString;
// example output: stdClass

$classString = new ClassString($classString);

echo $classString;
// example output: Darling\PHPTextTypes\classes\strings\ClassString

