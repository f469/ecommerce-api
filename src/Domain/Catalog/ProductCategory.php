<?php

namespace App\Domain\Catalog;

use Symfony\Component\Uid\Uuid;

class ProductCategory
{
    private string $id;
    private string $name;
    private ?string $description;

    public function __construct(string $name, ?string $description)
    {
        $this->id = Uuid::v7();

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
