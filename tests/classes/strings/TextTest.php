<?php

namespace Darling\PHPTextTypes\tests\classes\strings;

use Darling\PHPTextTypes\classes\strings\Text;
use Darling\PHPTextTypes\tests\PHPTextTypesTest;
use Darling\PHPTextTypes\tests\interfaces\strings\TextTestTrait;

class TextTest extends PHPTextTypesTest
{

    /**
     * The TextTestTrait defines common tests for implementations of
     * the Darling\PHPTextTypes\interfaces\strings\Text interface.
     *
     * @see TextTestTrait
     */
    use TextTestTrait;

    protected function setUp(): void
    {
        $string = $this->randomChars();
        $this->setExpectedString($string);
        $this->setTextTestInstance(new Text($string));
    }

}
