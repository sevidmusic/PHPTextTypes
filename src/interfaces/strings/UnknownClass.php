<?php

namespace Darling\PHPTextTypes\interfaces\strings;

use Darling\PHPTextTypes\interfaces\strings\ClassString;

/**
 * An UnknownClass is a ClassString that represents an unknown class.
 *
 * @example
 *
 * ```
 * echo $unknownClass;
 * // example output: Darling\PHPTextTypes\classes\strings\UnknownClass
 *
 * ```
 *
 * @see ClassString
 *
 */
interface UnknownClass extends ClassString
{

    /**
     * Return Darling\PHPTextTypes\classes\strings\UnknownClass
     *
     * @return string
     *
     * @example
     *
     * ```
     * echo $unknownClass->__toString();
     * // example output: Darling\PHPTextTypes\classes\strings\UnknownClass
     *
     * ```
     *
     */
    public function __toString(): string;

}

