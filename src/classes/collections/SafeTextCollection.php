<?php

namespace Darling\PHPTextTypes\classes\collections;

use \Darling\PHPTextTypes\interfaces\collections\SafeTextCollection as SafeTextCollectionInterface;
use \Darling\PHPTextTypes\classes\strings\SafeText;

final class SafeTextCollection implements SafeTextCollectionInterface
{

    /**
     * @var array<int, SafeText> $safeText
     */
    private array $safeText = [];

    /**
     * Instantiate a new SafeTextCollection.
     *
     * @param SafeText $safeText
     *
     */
    public function __construct(SafeText ...$safeText) {
        foreach($safeText as $safeText) {
            $this->safeText[] = $safeText;
        }
    }

    public function collection(): array
    {
        return $this->safeText;
    }

}

