<?php

namespace App\Domain\Catalog;

use App\Domain\Money\Amount;
use Symfony\Component\Uid\Uuid;

class Product
{
    private string $id;
    private string $reference;
    private ?string $name;
    private ?string $description;
    private Amount $price;
    private Amount $vat;
    private ProductCategory $category;

    public function __construct(
        ProductDTO $productDTO
    ) {
        $this->id = Uuid::v7();

        $this->reference = $productDTO->getReference();
        $this->name = $productDTO->getName();
        $this->description = $productDTO->getDescription();
        $this->price = new Amount($productDTO->getPrice());
        $this->vat = new Amount($productDTO->getVat());
    }

    public function computePrice(int $quantity): Amount
    {
        return $this->price->mul(new Amount($quantity));
    }

    public function computeVAT(int $quantity): Amount
    {
        return $this->price->mul($this->vat)->mul(new Amount($quantity));
    }

    public function data(): ProductDTO
    {
        return new ProductDTO(
            $this->id,
            $this->reference,
            $this->name,
            $this->description,
            $this->price->toFloat(),
            $this->vat->toFloat(),
            $this->category->data()->getName()
        );
    }

    public function addToCategory(ProductCategory $category)
    {
        $this->category = $category;
    }
}
