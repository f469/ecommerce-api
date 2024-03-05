<?php

namespace App\Domain\Catalog;

class ProductDTO
{
    private ?string $id;
    private string $reference;
    private ?string $name;
    private ?string $description;
    private float $price;
    private float $vat;
    private string $category;

    public function __construct(
        ?string $id,
        string $reference,
        ?string $name,
        ?string $description,
        float $price,
        float $vat,
        string $category
    ) {
        $this->id = $id;
        $this->reference = $reference;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->vat = $vat;
        $this->category = $category;
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

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }
}
