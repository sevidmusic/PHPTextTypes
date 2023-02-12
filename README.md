# PHPTextTypes

A collection of classes that represent various types of text.

# Installation

```
composer require darling/php-text-types
```

# Classes


### `Darling\PHPTextTypes\Text`

Text represents a string, can be cast to the string it represents,
and can provide information about the string it represents.

Note: The `Darling\PHPTextTypes\Text` class is the parent of all
      other classes defined by this library.

### `Darling\PHPTextTypes\ClassString`

A ClassString is the name of an existing Class prefixed by
it's namespace.

### `Darling\PHPTextTypes\UnknownClass`

An UnknownClass is a ClassString that represents an unknown class.

### `Darling\PHPTextTypes\SafeText`

SafeText is used to provide a safe form of Text that may contain
unsafe characters.

The following characters are considered safe:

- Alphanumeric characters: A-Z, a-z, and 0-9
- Underscores: _
- Hyphens: -
- Periods: .

Unsafe characters will be replaced with underscores.

A consecutive sequence of 2 or more unsafe characters will be
replaced by a single underscore.

A consecutive sequence of 2 or more underscores will be
replaced by a single underscore.

A consecutive sequence of 2 or more hyphens will be replaced by
a single hyphen.

A consecutive sequence of 2 or more periods will be replaced by
a single period.

SafeText will never be empty, if the original Text is empty, then
the SafeText will be the numeric character 0.

### `Darling\PHPTextTypes\AlphanumericText`

AlphanumericText is SafeText that only contains
alphanumeric characters.

### `Darling\PHPTextTypes\Name`

A Name is SafeText that begins with an alphanumeric character,
is at least 1 character in length, is no more than 70 characters
in length, and only contains the following characters:

- Alphanumeric characters: A-Z, a-z, and 0-9
- Underscores: _
- Hyphens: -
- Periods: .

### `Darling\PHPTextTypes\Id`

An Id is AlphanumericText whose length is between 60 and 80
characters.

# Example

The following example demonstrates how the classes provided
by the PHPTextTypes library might be used.

```
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

```

```
/** `Darling\PHPTextTypes\ClassString` */
/** `Darling\PHPTextTypes\UnknownClass` */
/** `Darling\PHPTextTypes\SafeText` */
/** `Darling\PHPTextTypes\AlphanumericText` */
/** `Darling\PHPTextTypes\Name` */
/** `Darling\PHPTextTypes\Id` */
```
