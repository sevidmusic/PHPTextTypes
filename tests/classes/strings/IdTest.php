<?php

namespace Darling\PHPTextTypes\tests\classes\strings;

use Darling\PHPTextTypes\classes\strings\Id;
use Darling\PHPTextTypes\tests\classes\strings\AlphanumericTextTest;
use Darling\PHPTextTypes\tests\interfaces\strings\IdTestTrait;

class IdTest extends AlphanumericTextTest
{

    /**
     * The IdTestTrait defines common tests for implementations
     * of the Darling\PHPTextTypes\interfaces\strings\Id interface.
     *
     * @see IdTestTrait
     *
     */
    use IdTestTrait;

    public function setUp(): void
    {
        $this->setUpWithNewInstance();
    }

    public function setUpWithNewInstance(): void
    {
        $id = new Id();
        $this->setTextTestInstance($id);
        $this->setSafeTextTestInstance($id);
        $this->setAlphanumericTextTestInstance($id);
        $this->setIdTestInstance($id);
        $this->setExpectedString($id);
    }

}

