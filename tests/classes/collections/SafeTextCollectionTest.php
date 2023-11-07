<?php

namespace Darling\PHPTextTypes\tests\classes\collections;

use \Darling\PHPTextTypes\classes\collections\SafeTextCollection;
use \Darling\PHPTextTypes\tests\PHPTextTypesTest;
use \Darling\PHPTextTypes\tests\interfaces\collections\SafeTextCollectionTestTrait;
use \Darling\PHPTextTypes\classes\strings\SafeText;
use \Darling\PHPTextTypes\classes\strings\Text;

final class SafeTextCollectionTest extends PHPTextTypesTest
{

    /**
     * The SafeTextCollectionTestTrait defines common tests for
     * implementations of the
     * Darling\PHPTextTypes\interfaces\collections\SafeTextCollection
     * interface.
     *
     * @see SafeTextCollectionTestTrait
     *
     */
    use SafeTextCollectionTestTrait;

    public function setUp(): void
    {
        $this->setExpectedCollection(
            [
                new SafeText(new Text($this->randomChars())),
                new SafeText(new Text($this->randomChars())),
                new SafeText(new Text($this->randomChars())),
                new SafeText(new Text($this->randomChars())),
                new SafeText(new Text($this->randomChars())),
            ]
        );
        $this->setSafeTextCollectionTestInstance(
            new SafeTextCollection(
                ...$this->expectedCollection(),
            )
        );
    }

}

