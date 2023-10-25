<?php

namespace Darling\PHPTextTypes\interfaces\collections;

use \Darling\PHPTextTypes\classes\strings\Id;

/**
 * A IdCollection is a collection of Id implementation instances.
 *
 */
interface IdCollection
{

    /**
     * Return a numerically indexed array of Id implementation
     * instances.
     *
     * @return array<int, Id>
     *
     */
    public function collection(): array;

}

