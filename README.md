# PHPTextTypes

A collection of classes that represent various types of text.

- [Installation](#installation)

- [Classes](#classes)

  - [Darling\PHPTextTypes\Text](#darlingphptexttypestext)
  - [Darling\PHPTextTypes\ClassString](#darlingphptexttypesclassstring)
  - [Darling\PHPTextTypes\UnknownClass](#darlingphptexttypesunknownclass)

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

Example:

```
<?php

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

```
### `Darling\PHPTextTypes\ClassString`

A ClassString is the name of an existing Class prefixed by
it's namespace.

Example:

```
<?php

use \Darling\PHPTextTypes\classes\strings\ClassString;

$obj = (object) array('propertyName' => 'value');

$classString = new ClassString($obj);

echo $classString;
// example output: stdClass

$classString = new ClassString($classString);

echo $classString;
// example output: Darling\PHPTextTypes\classes\strings\ClassString

```

### `Darling\PHPTextTypes\UnknownClass`

An UnknownClass is a ClassString that represents an unknown class.

Example:

```
<?php

use \Darling\PHPTextTypes\classes\strings\ClassString;
use \Darling\PHPTextTypes\classes\strings\UnknownClass;

$unknownClass = new UnknownClass();

echo $unknownClass;
// example output: Darling\PHPTextTypes\classes\strings\UnknownClass

/**
 * UnknownClass::class is returned by the ClassString class's
 * __toString() method when the class intended to be represented
 * by a ClassString instance does not exist.
 */

$classString = new ClassString('Class\That\Does\Not\Exist');

echo $classString;
// example output: Darling\PHPTextTypes\classes\strings\UnknownClass

$classString = new ClassString('a string');

echo $classString;
// example output: Darling\PHPTextTypes\classes\strings\UnknownClass


```

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

Example:

```
<?php

use \Darling\PHPTextTypes\classes\strings\SafeText;

$safeText = new SafeText(new Text('Foo Bar Baz'));

echo $safeText;
// example output: Foo_Bar_Baz


```

### `Darling\PHPTextTypes\AlphanumericText`

AlphanumericText is SafeText that only contains
alphanumeric characters.

Example:

```
<?php

use \Darling\PHPTextTypes\classes\strings\AlphanumericText;
use \Darling\PHPTextTypes\classes\strings\Text;

$alphanumericText = new AlphanumericText(
    new Text('Foo_Bar baz-bazzer')
);

echo $alphanumericText->originalText();
// example output: Foo_Bar baz-bazzer

echo $alphanumericText;
// example output: FooBarbazbazzer

```

### `Darling\PHPTextTypes\Name`

A Name is SafeText that begins with an alphanumeric character,
is at least 1 character in length, is no more than 70 characters
in length, and only contains the following characters:

- Alphanumeric characters: A-Z, a-z, and 0-9
- Underscores: _
- Hyphens: -
- Periods: .

Example:

```
<?php

use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;

$name = new Name(new Text('Foo Bar Baz. Bin Bar-Foo Bazzer'));

echo $name;
// example output: Foo_Bar_Baz.Bin_Bar-Foo_Bazzer

```

### `Darling\PHPTextTypes\Id`

An Id is AlphanumericText whose length is between 60 and 80
characters.

Example:

```
<?php

use \Darling\PHPTextTypes\classes\strings\Id;

$id = new Id();

echo $id;

// example output:
U7ok0eYte87rfdhl2nbMtLghqSQxRQH2FdOBUvjRQG5U99rEfV7m9CNiNLRMd

```

