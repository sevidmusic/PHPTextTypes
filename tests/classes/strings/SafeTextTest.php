<?php

namespace Darling\PHPTextTypes\tests\classes\strings;

use Darling\PHPTextTypes\classes\strings\SafeText;
use Darling\PHPTextTypes\classes\strings\Text as TextToBeRepresentedBySafeText;
use Darling\PHPTextTypes\interfaces\strings\Text as Text;
use Darling\PHPTextTypes\tests\classes\strings\TextTest;
use Darling\PHPTextTypes\tests\interfaces\strings\SafeTextTestTrait;

class SafeTextTest extends TextTest
{

    /**
     * The SafeTextTestTrait defines common tests for implementations
     * of the Darling\PHPTextTypes\interfaces\strings\SafeText interface.
     *
     * @see SafeTextTestTrait
     *
     */
    use SafeTextTestTrait;

    protected function setUp(): void
    {
        $this->setUpWithSpecificText(
            new TextToBeRepresentedBySafeText($this->randomChars())
        );
    }

    protected function setUpWithEmptyString(): void
    {
        $this->setUpWithSpecificText(
            new TextToBeRepresentedBySafeText('')
        );
    }

    protected function setUpWithSpecificText(Text $text): void
    {
        $safeText = new SafeText($text);
        $this->setTextTestInstance($safeText);
        $this->setSafeTextTestInstance($safeText);
        $this->setExpectedString($this->makeStringSafe($text));
    }

}
