<?php

namespace App\Domain\Catalog;

class ProductDTO
{
    private ?string $id;
    private string $reference;
    private string $name;
    private ?string $description;
    private float $price;
    private float $vat;

    public function __construct(
        ?string $id,
        string $reference,
        string $name,
        ?string $description,
        float $price,
        float $vat,
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

    public function getName(): string
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
