<?php

namespace Darling\PHPTextTypes\tests\classes\strings;

use Darling\PHPTextTypes\classes\strings\Name;
use Darling\PHPTextTypes\interfaces\strings\Text;
use Darling\PHPTextTypes\tests\interfaces\strings\NameTestTrait;

class NameTest extends SafeTextTest
{

    use NameTestTrait;

    protected function setUpWithSpecificText(Text $text): void
    {
        $name = new Name($text);
        $this->setTextTestInstance($name);
        $this->setSafeTextTestInstance($name);
        $this->setNameTestInstance($name);
        $this->setExpectedString($this->makeStringSafe($text));
    }

}
