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
echo '$text = new Text("Foo bar baz.");' . PHP_EOL . PHP_EOL;

echo 'echo $text;' . PHP_EOL;
echo $text . PHP_EOL . PHP_EOL;

echo 'echo strval($text->length());' . PHP_EOL;
echo strval($text->length()) . PHP_EOL . PHP_EOL;

echo 'echo ($text->contains($text) ? "True" : "False");' . PHP_EOL;
echo ($text->contains($text) ? 'True' : 'False') . PHP_EOL . PHP_EOL;

echo 'echo ($text->contains("Foo") ? "True" : "False");' . PHP_EOL;
echo ($text->contains('Foo') ? 'True' : 'False') . PHP_EOL . PHP_EOL;

echo 'echo ($text->contains("foo") ? "True" : "False");' . PHP_EOL;
echo ($text->contains('foo') ? 'True' : 'False') . PHP_EOL . PHP_EOL;

