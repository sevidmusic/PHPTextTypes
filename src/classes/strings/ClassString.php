<?php

namespace Darling\PHPTextTypes\classes\strings;

use Darling\PHPTextTypes\classes\strings\Text;
use Darling\PHPTextTypes\classes\strings\UnknownClass;
use Darling\PHPTextTypes\interfaces\strings\ClassString as ClassStringInterface;
use Darling\PHPTextTypes\interfaces\strings\Text as TextInterface;

class ClassString extends Text implements ClassStringInterface
{

    /**
     * Instantiate a new ClassString instance for the specified
     * $classStringOrObject if the specified $classStringOrObject
     * matches a valid class.
     *
     * The $classStringOrObject will be considered valid if:
     *
     * - The $classStringOrObject references an existing class that
     *   is not abstract.
     *
     * - The $classStringOrObject references an interface that is
     *   defined under a Darling namespace.
     *
     * - The $classStringOrObject references an abstract class that
     *   defined under a Darling namespace.
     *
     * If the specified $classStringOrObject does not match a valid
     * class, instantiate a new ClassString for an UnknownClass.
     *
     * Note:
     *
     * If the specified $classStringOrObject matches an interface
     * or abstract class that is defined under a Darling namespace,
     * and an implementation exists under a corresponding Darling
     * namespace, then instantiate the new ClassString instance
     * for the existing implementation.
     *
     * If the specified $classStringOrObject matches an interface
     * or abstract class that is defined under a Darling namespace,
     * but there is not an existing implementation, then instantiate
     * a ClassString for an UnknownClass.
     *
     * This caveat only applies to Darling interfaces and abstract
     * classes, specifying the fully qualified namespace and class
     * name of any other interface or abstract class will result in
     * the instantiation of ClassString for an UnknownClass.
     *
     * @param object|string $classStringOrObject
     *                          An object instance, or the fully
     *                          qualified namespace and class name
     *                          of an existing class.
     *
     *                          The fully qualified namespace and
     *                          class name of a Darling interface
     *                          or abstract class may also be
     *                          specified as long as the interface
     *                          or abstract class has been implemented
     *                          by a class under a corresponding
     *                          Darling namespace.
     *
     *                          This only applies to Darling
     *                          interfaces and abstract classes.
     *
     *                          Specifying the fully qualified
     *                          namespace and class name of
     *                          any other interface or abstract
     *                          class will result in the
     *                          instantiation of ClassString
     *                          for an UnknownClass.
     *
     * @example
     *
     * ```
     * $class = \stdClass::class;
     *
     * $classString =
     *     new \Darling\PHPTextTypes\classes\strings\ClassString(
     *         $class
     *     );
     *
     * echo $classString;
     *
     * // example output:
     * stdClass
     *
     * $classString =
     *     new \Darling\PHPTextTypes\classes\strings\ClassString(
     *         \Darling\PHPTextTypes\interfaces\strings\Text::class
     *     );
     *
     * echo $classString;
     *
     * // example output:
     * Darling\PHPTextTypes\classes\strings\Text
     *
     * interface I {}
     *
     * $classString =
     *     new \Darling\PHPTextTypes\classes\strings\ClassString(
     *         I::class
     *     );
     *
     * echo $classString;
     *
     * // example output:
     * Darling\PHPTextTypes\classes\strings\UnknownClass
     *
     * ```
     *
     */
    public function __construct(object|string $classStringOrObject)
    {
        parent::__construct($this->determineFullyQualifiedClassName($classStringOrObject));
    }

    /**
     * Determine the fully qualified namespace and class name of
     * a specified class or object.
     *
     * If the specified class does not exist, then the following
     * fully qualified namespace and class name will be returned:
     *
     * Darling\PHPTextTypes\classes\strings\UnknownClass
     *
     * @return string
     *
     * @example
     *
     * ```
     * echo $this->determineFullyQualifiedClassName($this);
     * // example output: Darling\PHPTextTypes\classes\strings\ClassString
     *
     * echo $this->determineFullyQualifiedClassName($this::class);
     * // example output: Darling\PHPTextTypes\classes\strings\ClassString
     *
     * echo $this->determineFullyQualifiedClassName(\Darling\PHPTextTypes\interfaces\strings\Text::class);
     * // example output: Darling\PHPTextTypes\classes\strings\Text
     *
     *
     * echo $this->determineFullyQualifiedClassName('invalidClass');
     * // example output: Darling\PHPTextTypes\classes\strings\UnknownClass
     *
     * ```
     *
     */
    private function determineFullyQualifiedClassName(object|string $class): string
    {
        return match(is_object($class)) {
            true => $class::class,
            default => ($this->determineClassString($class)),
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
}

