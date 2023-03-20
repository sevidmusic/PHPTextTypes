<?php

namespace Darling\PHPTextTypes\Tests\classes\strings;

use Darling\PHPTextTypes\classes\strings\UnknownClass;
use Darling\PHPTextTypes\Tests\classes\strings\ClassStringTest;
use Darling\PHPTextTypes\Tests\interfaces\strings\UnknownClassTestTrait;

final class UnknownClassTest extends ClassStringTest
{

    /**
     * The UnknownClassTestTrait defines common tests for implementations
     * of the Darling\PHPTextTypes\interfaces\strings\UnknownClass interface.
     *
     * @see UnknownClassTestTrait
     *
     */
    use UnknownClassTestTrait;

    protected function setUpWithSpecifiedClass(
        object|string $classString
        ): void
    {
        $classString = new UnknownClass();
        $this->setTextTestInstance($classString);
        $this->setClassStringTestInstance($classString);
        $this->setUnknownClassTestInstance($classString);
        $this->setExpectedString($classString);
    }

}

