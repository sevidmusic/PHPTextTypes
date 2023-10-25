<?php

namespace Darling\PHPTextTypes\tests\classes\collections;

use \Darling\PHPTextTypes\classes\collections\NameCollection;
use \Darling\PHPTextTypes\tests\PHPTextTypesTest;
use \Darling\PHPTextTypes\tests\interfaces\collections\NameCollectionTestTrait;

class NameCollectionTest extends PHPTextTypesTest
{

    /**
     * The NameCollectionTestTrait defines
     * common tests for implementations of the
     * Darling\PHPTextTypes\interfaces\collections\NameCollection
     * interface.
     *
     * @see NameCollectionTestTrait
     *
     */
    use NameCollectionTestTrait;

    public function setUp(): void
    {
        $this->setNameCollectionTestInstance(
            new NameCollection()
        );
    }
}

