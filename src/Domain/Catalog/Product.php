<?php

namespace App\Domain\Catalog;

use App\Domain\Money\Amount;
use Symfony\Component\Uid\Uuid;

class Product
{
    private string $id;
    private string $reference;
    private string|null $name;
    private string|null $description;

    private Amount $price;
    private Amount $vat;

    /**
     * @param float $price
     * @param float $vat
     */
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

    public function computeVAT(): Amount
    {
        return $this->price->mul($this->vat);
    }

    public function data(): ProductDTO
    {
        return new ProductDTO(
            $this->id,
            $this->reference,
            $this->name,
            $this->description,
            $this->price->toFloat(),
            $this->vat->toFloat()
        );
    }
}
