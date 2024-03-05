<?php

namespace App\Tests\Builder;

use App\Domain\Catalog\Product;
use App\Domain\Catalog\ProductDTO;
use App\Domain\Money\Amount;

class ProductBuilder
{
    private string $reference;
    private string|null $name;
    private string|null $description;
    private Amount $price;
    private Amount $vat;

    public static function create(): self {
        return new self();
    }

    public function withReference(string $reference): void {
        $this->reference = $reference;
    }
    public function withDescription(string $description): void {
        $this->description = $description;
    }
    public function withName(string $name): void {
        $this->name = $name;
    }
    public function withPrice(float|string $price): void {
        $this->price = $price;
    }
    public function withVat(float|string $vat): void {
        $this->vat = $vat;
    }

    public function build(): Product {
        return new Product(
            new ProductDTO(
                null,
                'reference',
                'description',
                'name',
                50.00,
                0.02)
        );
    }
}