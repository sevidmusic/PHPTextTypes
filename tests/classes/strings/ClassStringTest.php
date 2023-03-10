<?php

namespace tests\classes\strings;

use Darling\PHPTextTypes\classes\strings\ClassString;
use Darling\PHPTextTypes\classes\strings\Text as TextToBeRepresentedByClassString;
use Darling\PHPTextTypes\classes\strings\UnknownClass;
use Darling\PHPTextTypes\interfaces\strings\Text as Text;
use tests\classes\strings\TextTest;
use tests\interfaces\strings\ClassStringTestTrait;

class ClassStringTest extends TextTest
{

    /**
     * The ClassStringTestTrait defines common tests for
     * implementations of the Darling\PHPTextTypes\interfaces\strings\ClassString
     * interface.
     *
     * @see ClassStringTestTrait
     *
     */
    use ClassStringTestTrait;

    protected function setUp(): void
    {
        $values = [
            $this->randomChars(),
            ClassString::class,
            $this,
        ];
        $this->setUpWithSpecifiedClass(
            $values[array_rand($values)]
        );
    }

    protected function setUpWithSpecifiedClass(
        object|string $classString
    ): void
    {
        $this->setExpectedString(
            $this->determineClass($classString)
        );
        $classStringInstance = new ClassString($classString);
        $this->setTextTestInstance($classStringInstance);
        $this->setClassStringTestInstance($classStringInstance);
    }

}

