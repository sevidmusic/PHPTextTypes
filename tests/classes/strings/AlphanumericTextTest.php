<?php

namespace Darling\PHPTextTypes\tests\classes\strings;

use Darling\PHPTextTypes\classes\strings\AlphanumericText;
use Darling\PHPTextTypes\interfaces\strings\Text;
use Darling\PHPTextTypes\tests\classes\strings\SafeTextTest;
use Darling\PHPTextTypes\tests\interfaces\strings\AlphanumericTextTestTrait;

class AlphanumericTextTest extends SafeTextTest
{

    /**
     * The AlphanumericTextTestTrait defines
     * common tests for implementations of the
     * Darling\PHPTextTypes\interfaces\strings\AlphanumericText
     * interface.
     *
     * @see AlphanumericTextTestTrait
     *
     */
    use AlphanumericTextTestTrait;

    protected function setUpWithSpecificText(Text $text): void
    {
        $alphanumericText = new AlphanumericText($text);
        $this->setTextTestInstance($alphanumericText);
        $this->setSafeTextTestInstance($alphanumericText);
        $this->setAlphanumericTextTestInstance($alphanumericText);
        $this->setExpectedString($this->makeStringSafe($text));
    }

}

