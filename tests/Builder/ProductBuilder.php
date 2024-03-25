<?php

namespace App\Tests\Builder;

use App\Domain\Catalog\Product;
use App\Domain\Catalog\ProductDTO;

class ProductBuilder
{
    private ?string $reference = 'reference';
    private ?string $name = null;
    private ?string $description = null;
    private ?string $price = '30.00';
    private ?string $vat = '0.20';

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
                $this->description,
                $this->name,
                (float) $this->price,
                (float) $this->vat,
                'category'
            )
        );
    }
}
