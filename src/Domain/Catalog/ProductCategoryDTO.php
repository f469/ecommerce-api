<?php

namespace App\Domain\Catalog;

class ProductCategoryDTO
{
    private ?string $id;
    private string $name;
    private ?string $description;

    public function __construct(?string $id, string $name, ?string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
}
