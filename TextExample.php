<?php

require __DIR__ . '/vendor/autoload.php';

use \Darling\PHPTextTypes\classes\strings\Text;

$text = new Text('Foo bar baz.');

echo $text;
// example output: Foo bar baz.

echo strval($text->length());
// example output: 12

echo ($text->contains($text) ? 'True' : 'False');
// example output: True

echo ($text->contains('Foo') ? 'True' : 'False');
// example output: True

echo ($text->contains('foo') ? 'True' : 'False');
// example output: False

