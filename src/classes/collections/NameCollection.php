<?php

namespace Darling\PHPTextTypes\classes\collections;

use \Darling\PHPTextTypes\interfaces\collections\NameCollection as NameCollectionInterface;
use \Darling\PHPTextTypes\interfaces\strings\Name;

final class NameCollection implements NameCollectionInterface
{

    /**
     * @var array<int, Name> $names
     */
    private array $names = [];

    /**
     * Instantiate a new NameCollection.
     *
     * @param Name $names
     *
     */
    public function __construct(Name ...$names) {
        foreach($names as $name) {
            $this->names[] = $name;
        }
    }

    public function collection(): array
    {
        return $this->names;
    }

}

