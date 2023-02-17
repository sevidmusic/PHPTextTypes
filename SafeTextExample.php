<?php

require __DIR__ . '/vendor/autoload.php';

use \Darling\PHPTextTypes\classes\strings\SafeText;
use \Darling\PHPTextTypes\classes\strings\Text;

$safeText = new SafeText(new Text('Foo Bar Baz'));

echo $safeText;
// example output: Foo_Bar_Baz

