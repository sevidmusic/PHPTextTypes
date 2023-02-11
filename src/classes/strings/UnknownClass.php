<?php

namespace Darling\PHPTextTypes\classes\strings;

use Darling\PHPTextTypes\interfaces\strings\UnknownClass as UnknownClassInterface;

use Darling\PHPTextTypes\classes\strings\ClassString;

final class UnknownClass extends ClassString implements UnknownClassInterface
{

    /**
     * Instantiate a new UnknownClass instance.
     *
     * @example
     *
     * ```
     * $text = new UnknownClass();
     *
     * echo $unknownClass;
     * // example output: Darling\PHPTextTypes\classes\strings\UnknownClass
     *
     * ```
     *
     */
    public function __construct()
    {
        parent::__construct(get_class($this));
    }

}

