<?php

namespace App\Domain\Catalog;

use App\Domain\Id;

class ProductCategory
{
    private string $id;
    private string $name;
    private ?string $description;

    public function __construct(
        string $name,
        ?string $description,
        Id $id
    ) {
        $this->id = $id->generate();

        $this->name = $name;
        $this->description = $description;
    }

    public function data(): ProductCategoryDTO
    {
        return new ProductCategoryDTO(
            $this->id,
            $this->name,
            $this->description
        );
    }
}
