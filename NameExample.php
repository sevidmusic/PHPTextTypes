<?php

require __DIR__ . '/vendor/autoload.php';

use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;

$name = new Name(new Text('Foo Bar Baz. Bin Bar-Foo Bazzer'));

echo $name;
// example output: Foo_Bar_Baz.Bin_Bar-Foo_Bazzer
