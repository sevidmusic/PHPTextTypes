<?php

namespace Darling\PHPTextTypes\interfaces\collections;

use \Darling\PHPTextTypes\classes\strings\SafeText;

/**
 * A SafeTextCollection is a collection of Name implementation instances.
 *
 */
interface SafeTextCollection
{

    /**
     * Return a numerically indexed array of Name implementation
     * instances.
     *
     * @return array<int, SafeText>
     *
     */
    public function collection(): array;

}

