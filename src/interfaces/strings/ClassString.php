<?php

namespace Darling\PHPTextTypes\interfaces\strings;

use Darling\PHPTextTypes\interfaces\strings\Text;

/**
 * A ClassString is the name of an existing Class prefixed by
 * it's namespace.
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
     * Return the name of an existing Class prefixed by it's
     * namespace.
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

