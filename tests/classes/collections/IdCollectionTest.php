<?php

namespace Darling\PHPTextTypes\tests\classes\collections;

use \Darling\PHPTextTypes\classes\collections\IdCollection;
use \Darling\PHPTextTypes\tests\PHPTextTypesTest;
use \Darling\PHPTextTypes\tests\interfaces\collections\IdCollectionTestTrait;
use \Darling\PHPTextTypes\classes\strings\Id;

final class IdCollectionTest extends PHPTextTypesTest
{

    /**
     * The IdCollectionTestTrait defines common tests for
     * implementations of the
     * Darling\PHPTextTypes\interfaces\collections\IdCollection
     * interface.
     *
     * @see IdCollectionTestTrait
     *
     */
    use IdCollectionTestTrait;

    public function setUp(): void
    {
        $this->setExpectedCollection(
            [
                new Id(),
                new Id(),
                new Id(),
                new Id(),
                new Id(),
            ]
        );
        $this->setIdCollectionTestInstance(
            new IdCollection(
                ...$this->expectedCollection(),
            )
        );
    }

}

