<?php

namespace Darling\PHPTextTypes\Tests\interfaces\strings;

use Darling\PHPTextTypes\Tests\interfaces\strings\TextTestTrait;
use Darling\PHPTextTypes\classes\strings\SafeText as ExistingClassSafeText;
use Darling\PHPTextTypes\classes\strings\Text as ExistingClassText;
use Darling\PHPTextTypes\classes\strings\UnknownClass;
use Darling\PHPTextTypes\interfaces\strings\ClassString;
use Darling\PHPTextTypes\interfaces\strings\Text;

/**
 * The ClassStringTestTrait defines common tests for implementations
 * of the ClassString interface.
 *
 * @see ClassString
 *
 */
trait ClassStringTestTrait
{

    /**
     * The TextTestTrait defines common tests for implementations of
     * the Text interface.
     *
     * @see TextTestTrait
     *
     */
    use TextTestTrait;

    /**
     * @var ClassString $classString An instance of a ClassString
     *                               implementation to test.
     */
    protected ClassString $classString;

    /**
     * Setup using a random string, class-string, or object
     * instance.
     *
     * This method must pass a random string, class-string, or object
     * instance to the setUpWithSpecifiedClass() method.
     *
     * This method may perform any additional set up that may be
     * required.
     *
     * @return void
     *
     * @example
     *
     * ```
     * protected function setUp(): void
     * {
     *     $values = [
     *         $this->randomChars(),
     *         ClassString::class,
     *         Text::class,
     *         $this,
     *     ];
     *     $this->setUpWithSpecifiedClass(
     *         $values[array_rand($values)]
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Setup with the specified $classStringOrObject.
     *
     * This method must pass the result of passing the specified
     * $classStringOrObject to the determineExpectedClassString()
     * method to the setExpectedString() method.
     *
     * This method must also pass the ClassString implementation
     * instance to be tested to the setTextTestInstance() and
     * setClassStringTestInstance() methods.
     *
     * This method may also perform any additional setup that may
     * be required.
     *
     * @param object|string|class-string $classStringOrObject
     *
     * @return void
     *
     * @example
     *
     * ```
     * protected function setUpWithSpecifiedClass(
     *     object|string $classStringOrObject
     * ): string
     * {
     *     $this->setExpectedString(
     *         $this->determineExpectedClassString(
     *             $classStringOrObject
     *         )
     *     );
     *     $classStringOrObjectInstance =
     *         new \Darling\PHPTextTypes\classes\strings\ClassString(
     *             $classStringOrObject
     *         );
     *     $this->setTextTestInstance($classStringOrObjectInstance);
     *     $this->setClassStringTestInstance(
     *         $classStringOrObjectInstance
     *     );
     * }
     *
     * ```
     */
    abstract protected function setUpWithSpecifiedClass(
        object|string $classStringOrObject
    ): void;

    /**
     * Return the ClassString implementation instance to test.
     *
     * @return ClassString
     *
     * @example
     *
     * ```
     * $this->classStringTestInstance();
     *
     * ```
     *
     */
    protected function classStringTestInstance(): ClassString
    {
        return $this->classString;
    }

    /**
     * Set the ClassString implementation instance to test.
     *
     * @param ClassString $classStringTestInstance An instance of an
     *                                             implementation of
     *                                             the ClassString
     *                                             interface to test.
     *
     * @return void
     *
     * @example
     *
     * ```
     * $this->setClassStringTestInstance(
     *     new \Darling\PHPTextTypes\classes\strings\ClassString(
     *         \stdClass::class
     *     )
     * );
     *
     * ```
     *
     */
    protected function setClassStringTestInstance(
        ClassString $classStringTestInstance
    ): void
    {
        $this->classString = $classStringTestInstance;
    }

    /**
     * Determine fully qualified class name that is expected to be
     * returned by the ClassString implementation instance being
     * tested's __toString() method given the specified $class.
     *
     * If the specified $class is an object instance, then the fully
     * qualified class name of the specified object instance will be
     * returned.
     *
     * If the specified $class is the fully qualified class name of
     * an existing class that is not abstract, then the specified
     * $class will be returned unmodified.
     *
     * If the specified $class is the fully qualified class name of
     * an existing class that is abstract, then the fully qualified
     * class name of an UnknownClass will be returned.
     *
     * If the specified $class is the fully qualified class name of
     * a Darling interface or abstract class that has an existing
     * implementation defined under a corresponding namespace, then
     * the full qualified class name of the appropriate Darling class
     * will be returned.
     *
     * If an appropriate class string cannot be determined for
     * the specified $class then the fully qualified class name
     * of an UnknownClass will be returned.
     *
     * @return class-string
     *
     * @example
     *
     * ```
     * echo $this->determineClassString(\Darling\PHPTextTypes\interfaces\strings\Text::class;
     * // example output: Darling\PHPTextTypes\classes\strings\Text
     *
     * echo $this->determineExpectedClassString('invalid-class-string');
     * // example output: Darling\PHPTextTypes\classes\strings\UnknownClass
     *
     * ```
     *
     */
    protected function determineExpectedClassString(
        object|string $class
    ): string
    {
        return match(is_object($class)) {
            true => $class::class,
            default =>
                $this->determineClassString(
                    (
                        is_object($class)
                        ? $class::class
                        : $class
                    )
                ),
        };
    }

    /**
     * Return the class-string for the specified $class if the
     * specified $class is valid.
     *
     * Return the class-string for an UnknownClass::class if
     * the $class is not valid.
     *
     * The $class will be considered invalid if:
     *
     * - The $class references a class that does not exist.
     *
     * - The $class references an interface that is
     *   not defined under a Darling namespace.
     *
     * - The $class references an abstract class that is
     *   not defined under a Darling namespace.
     *
     * If the $class references an interface or abstract
     * class that is defined under a Darling namespace, and an
     * implementation exists under a corresponding namespace,
     * then the class-string for the existing implementation of
     * the interface or abstract class referenced by the
     * specified $class will be returned.
     *
     * For example:
     *
     * ```
     * var_dump($this->determineClassString(
     *     \Darling\PHPTextTypes\interfaces\strings\Text::class
     * );
     *
     * // example output:
     * string(41) "Darling\\PHPTextTypes\\classes\\strings\\Text"
     *
     * ```
     *
     * @return class-string
     *
     * @example
     *
     * ```
     * var_dump($this->determineClassString(
     *     \Darling\PHPTextTypes\interfaces\strings\Text::class
     * );
     *
     * // example output:
     * string(41) "Darling\\PHPTextTypes\\classes\\strings\\Text"
     *
     * ```
     *
     */
    private function determineClassString(string $class): string
    {
        return match(
            $this->classStringMatchesAnExistingInterfaceOrClass(
                $class
            )
        ) {
            true => $this->determineAppropriateClassString($class),
            default => UnknownClass::class,
        };
    }

    /**
     * Return the fully qualified namespace and class name of the
     * specified $class if it exists and is not abstract, otherwise
     * return UnknownClass::class.
     *
     * Note: If the specified $class references an interface or
     * abstract class defined under the Darling namespace, and
     * there is an existing implementation of the interface
     * or abstract class defined under a corresponding namespace,
     * then the fully qualified namespace and class name of the
     * relevant implementation will be returned.
     *
     * @return class-string
     *
     * @example
     *
     * ```
     * var_dump($this->determineAppropriateClassString(
     *     \Darling\PHPTextTypes\interfaces\strings\Text::class
     * );
     *
     * // example output:
     * string(41) "Darling\\PHPTextTypes\\classes\\strings\\Text"
     *
     * ```
     *
     */
    public function determineAppropriateClassString(string $class): string
    {
        $this->correctDarlingNamespaces($class);
        if(
            class_exists($class)
        ) {
            $reflectionClass = new \ReflectionClass($class);
            return match(!$reflectionClass->isAbstract()) {
                true => $class,
                default => UnknownClass::class,
            };
        }
        return UnknownClass::class;
    }

    /**
     * Return true if the specified $classString corresponds to
     * an existing interface, abstract class, or class, flase
     * otherwise.
     *
     * @return bool
     *
     * @example
     *
     * ```
     * var_dump(
     *     $this->classStringMatchesAnExistingInterfaceOrClass(
     *         \stdClass::class
     *     )
     * );
     *
     * // example output
     * (bool)true
     *
     * var_dump(
     *     $this->classStringMatchesAnExistingInterfaceOrClass(
     *         'class or interface does not exist'
     *     )
     * );
     *
     * // example output
     * (bool)false
     *
     * ```
     *
     */
    private function classStringMatchesAnExistingInterfaceOrClass(
        string $classString
    ): bool
    {
            return interface_exists($classString)
            ||
            class_exists($classString);
    }

    /**
     * If the specified $classString matches a Darling namespace
     * that is not a test namespace, modify the $classString,
     * replacing the following words with the word classes:
     *
     * interfaces
     * abstractions
     *
     * If the specified $classString does not match a Darling
     * namespace then the $classString will not be modified.
     *
     * @return void
     *
     * @example
     *
     * ```
     * $classString =
     *     \Darling\PHPTextTypes\interfaces\strings\Text::class;
     *
     * $this->correctDarlingNamespaces($classString);
     *
     * var_dump($classString);
     *
     * // example output:
     * string(41) "Darling\\PHPTextTypes\\classes\\strings\\Text"
     *
     * ```
     *
     */
    protected function correctDarlingNamespaces(string &$classString): void
    {
        if(
            substr($classString, 0, 7) === 'Darling'
            &&
            !str_contains($classString, '\\tests\\')
        ) {
            $classString = str_replace(
                ['interfaces', 'abstractions'],
                'classes',
                $classString
            );
        }
    }

    /**
     * Test that __toString() returns the fully qualified class name
     * of an UnknownClass if the expected class does not exist.
     *
     * @return void
     *
     * @covers \Darling\PHPTextTypes\classes\strings\ClassString::__toString()
     *
     */
    public function test___toString_returns_the_fully_qualified_class_name_of_an_UnknonwClass_if_the_expected_class_does_not_exist(): void
    {
        $this->setUpWithSpecifiedClass($this->randomChars());
        $this->assertEquals(
            UnknownClass::class,
            $this->classStringTestInstance()->__toString(),
            $this->testFailedMessage(
                $this->classStringTestInstance(),
                '__toString',
                'return the fully qualified class name of an ' .
                UnknownClass::class .
                ' if the expected class does not exist'
            )
        );
    }

    /**
     *
     * Test that __toString() returns the fully qualified class
     * name of an existing class.
     *
     * @return void
     *
     * @covers \Darling\PHPTextTypes\classes\strings\ClassString::__toString()
     *
     */
    public function test___toString_returns_the_fully_qualified_class_name_of_an_existing_class(): void
    {
        $this->assertTrue(
            class_exists(
                $this->classStringTestInstance()->__toString()
            ),
            $this->testFailedMessage(
                $this->classStringTestInstance(),
                '__toString',
                'return the fully qualified class name of an ' .
                'existing class'
            )
        );
    }

    /**
     * Test that __toString() returns the fully qualified class
     * name of the expected class.
     *
     * @return void
     *
     * @covers \Darling\PHPTextTypes\classes\strings\ClassString::__toString()
     */
    public function test___toString_returns_the_fully_qualified_class_name_of_the_expected_class(): void
    {
        $values = [
            $this,
            new ExistingClassText('Foo'),
            new ExistingClassSafeText(new ExistingClassText('Bar'))
        ];
        $randClass = $values[array_rand($values)];
        $expectedClass = get_class($randClass);
        $this->setUpWithSpecifiedClass($randClass);
        $this->assertEquals(
            $expectedClass,
            $this->classStringTestInstance()->__toString(),
            $this->testFailedMessage(
                $this->classStringTestInstance(),
                '__toString',
                'return the fully qualified class name of the ' .
                'expected class'
            )
        );
    }
}

