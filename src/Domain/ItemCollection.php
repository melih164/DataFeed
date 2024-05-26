<?php

namespace App\Domain;

use App\Domain\Entity\Item;

class ItemCollection
{
    private array $itemCollection = [];

    public function add(Item $item): void
    {
        $this->itemCollection[] = $item;
    }

    public function getItemCollection(): array
    {
        return $this->itemCollection;
    }
}