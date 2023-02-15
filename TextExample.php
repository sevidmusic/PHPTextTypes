<?php

/**
 * Example of how to use the following type:
 *
 * \Darling\PHPTextTypes\classes\strings\Text
 *
 */

require __DIR__ . '/vendor/autoload.php';

use \Darling\PHPTextTypes\classes\strings\Text;

$text = new Text('Foo bar baz.');

echo $text;
// output: Foo bar baz.

echo strval($text->length());
// output: 12

echo ($text->contains($text) ? 'True' : 'False');
// output: True

echo ($text->contains('Foo') ? 'True' : 'False');
// output: True

echo ($text->contains('foo') ? 'True' : 'False');
// output: False

