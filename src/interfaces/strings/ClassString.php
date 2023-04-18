<?php

namespace Darling\PHPTextTypes\interfaces\strings;

use Darling\PHPTextTypes\interfaces\strings\Text;

/**
 * A ClassString is the fully qualified namespace and class name of
 * an existing Class that is not abstract.
 *
 * @example
 *
 * ```
 * echo $classString;
 * // example output: Darling\PHPTextTypes\classes\strings\ClassString
 *
 * ```
 *
 * @see Text
 *
 */
interface ClassString extends Text
{

    /**
     * Return the fully qualified namespace and class name of an
     * existing Class that is not abstract.
     *
     * @return class-string
     *
     * @example
     *
     * ```
     * echo $classString->__toString();
     * // example output: Darling\PHPTextTypes\classes\strings\ClassString
     *
     * ```
     *
     */
    public function __toString(): string;

}

