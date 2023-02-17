<?php

require __DIR__ . '/vendor/autoload.php';

use \Darling\PHPTextTypes\classes\strings\ClassString;
use \Darling\PHPTextTypes\classes\strings\UnknownClass;

$unknownClass = new UnknownClass();

echo $unknownClass;
// example output: Darling\PHPTextTypes\classes\strings\UnknownClass

/**
 * Note:
 *
 * UnknownClass::class will be returned by a ClassString instance's
 * __toString() method if the class represented by the ClassString
 * instance does not actually exist.
 *
 * For Example:
 *
 */

$classString = new ClassString('Class\That\Does\Not\Exist');

echo $classString;
// example output: Darling\PHPTextTypes\classes\strings\UnknownClass

$classString = new ClassString('a string');

echo $classString;
// example output: Darling\PHPTextTypes\classes\strings\UnknownClass

