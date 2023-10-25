<?php

namespace Darling\PHPTextTypes\tests\classes\collections;

use \Darling\PHPTextTypes\classes\collections\NameCollection;
use \Darling\PHPTextTypes\tests\PHPTextTypesTest;
use \Darling\PHPTextTypes\tests\interfaces\collections\NameCollectionTestTrait;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;

final class NameCollectionTest extends PHPTextTypesTest
{

    /**
     * The NameCollectionTestTrait defines common tests for
     * implementations of the
     * Darling\PHPTextTypes\interfaces\collections\NameCollection
     * interface.
     *
     * @see NameCollectionTestTrait
     *
     */
    use NameCollectionTestTrait;

    public function setUp(): void
    {
        $this->setExpectedCollection(
            [
                new Name(new Text($this->randomChars())),
                new Name(new Text($this->randomChars())),
                new Name(new Text($this->randomChars())),
                new Name(new Text($this->randomChars())),
                new Name(new Text($this->randomChars())),
            ]
        );
        $this->setNameCollectionTestInstance(
            new NameCollection(
                ...$this->expectedCollection(),
            )
        );
    }

}

