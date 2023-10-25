<?php

namespace Darling\PHPTextTypes\interfaces\collections;

use \Darling\PHPTextTypes\classes\strings\Name;

/**
 * A NameCollection is a collection of Name implementation instances.
 *
 */
interface NameCollection
{

    /**
     * Return a numerically indexed array of Name implementation
     * instances.
     *
     * @return array<int, Name>
     *
     */
    public function collection(): array;

}

