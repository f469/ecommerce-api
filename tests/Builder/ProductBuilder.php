<?php

namespace App\Tests\Builder;

use App\Domain\Catalog\Product;
use App\Domain\Catalog\ProductDTO;
use App\Utils\UuidGenerator;

class ProductBuilder
{
    private string $reference = 'reference';
    private string $name = 'name';
    private ?string $description = null;
    private string $price = '30.00';
    private string $vat = '0.20';

    public static function create(): self
    {
        return new self();
    }

    public function withReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function withDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function withName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function withPrice(float|string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function withVat(float|string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function build(): Product
    {
        return new Product(
            new ProductDTO(
                null,
                $this->reference,
                $this->name,
                $this->description,
                (float) $this->price,
                (float) $this->vat,
            ),
            new UuidGenerator()
        );
    }
}
