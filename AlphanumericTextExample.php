<?php

require __DIR__ . '/vendor/autoload.php';

use \Darling\PHPTextTypes\classes\strings\AlphanumericText;
use \Darling\PHPTextTypes\classes\strings\Text;

$alphanumericText = new AlphanumericText(
    new Text('Foo_Bar baz-bazzer')
);

echo $alphanumericText->originalText();
// example output: Foo_Bar baz-bazzer

echo $alphanumericText;
// example output: FooBarBazBazzer

