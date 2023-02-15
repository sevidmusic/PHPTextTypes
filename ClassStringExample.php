<?php

require __DIR__ . '/vendor/autoload.php';

use \Darling\PHPTextTypes\classes\strings\ClassString;

$obj = (object) array('propertyName' => 'value');

$classString = new ClassString($obj);

echo $classString . PHP_EOL;

$classString = new ClassString($classString);

echo $classString . PHP_EOL;

