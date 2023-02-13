<?php

require str_replace(
    'examples',
    '',
    __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php'
);

use \Darling\PHPTextTypes\classes\strings\Text;

$text = new Text('Foo bar baz.');

echo $text;
// example output: Foo bar baz.

echo strval($text->length());
// example output: 12

echo ($text->contains($text) ? 'True' : 'False');
// example output: True

