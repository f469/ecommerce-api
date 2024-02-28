<?php

namespace App\Domain\Catalog;

use App\Domain\Money\Amount;

class ProductDTO
{
    private string|null $id;
    private string $reference;
    private string|null $name;
    private string|null $description;
    private float $price;
    private float $vat;

    /**
     * @param string $id
     * @param string $reference
     * @param string|null $name
     * @param string|null $description
     * @param float $price
     * @param float $vat
     */
    public function __construct(
        string|null $id,
        string $reference,
        ?string $name,
        ?string $description,
        float $price,
        float $vat
    ) {
        $this->id = $id;
        $this->reference = $reference;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->vat = $vat;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getVat(): float
    {
        return $this->vat;
    }
}