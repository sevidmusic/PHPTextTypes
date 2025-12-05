<?php

namespace Darling\PHPTextTypes\tests\classes\strings;

use Darling\PHPTextTypes\classes\strings\ClassString;
use Darling\PHPTextTypes\interfaces\strings\Text as Text;
use Darling\PHPTextTypes\tests\classes\strings\TextTest;
use Darling\PHPTextTypes\tests\interfaces\strings\ClassStringTestTrait;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ClassStringTest::class)]
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
            Text::class,
            $this,
            $this->randomChars(),
        ];
        $this->setUpWithSpecifiedClass(
            $values[array_rand($values)]
        );
    }

    protected function setUpWithSpecifiedClass(
        object|string $classString
    ): void {
        $this->setExpectedString(
            $this->determineExpectedClassString($classString)
        );
        $classStringInstance = new ClassString($classString);
        $this->setTextTestInstance($classStringInstance);
        $this->setClassStringTestInstance($classStringInstance);
    }
}
