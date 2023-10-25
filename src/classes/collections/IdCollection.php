<?php

namespace Darling\PHPTextTypes\classes\collections;

use \Darling\PHPTextTypes\interfaces\collections\IdCollection as IdCollectionInterface;
use \Darling\PHPTextTypes\classes\strings\Id;

final class IdCollection implements IdCollectionInterface
{

    /**
     * @var array<int, Id> $ids
     */
    private array $ids = [];

    /**
     * Instantiate a new IdCollection.
     *
     * @param Id $ids
     *
     */
    public function __construct(Id ...$ids) {
        foreach($ids as $id) {
            $this->ids[] = $id;
        }
    }

    public function collection(): array
    {
        return $this->ids;
    }

}

