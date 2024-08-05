<?php

namespace App\Domain\Order;

use App\Domain\Catalog\Product;
use App\Domain\Id;
use App\Domain\Money\Amount;

class CartLine
{
    private string $id;
    private Product $product;
    private int $quantity;

    public function __construct(
        Product $product,
        int $quantity,
        Id $id
    ) {
        $this->id = $id->generate();

        $this->product = $product;

        $this->quantity = $quantity;
    }

    public function increaseQuantity(): void
    {
        $this->quantity = $this->quantity + 1;
    }

    public function decreaseQuantity(): void
    {
        $this->quantity = $this->quantity - 1;
    }

    public function computePrice(): Amount
    {
        return $this->product->computePrice($this->quantity);
    }

    public function computeVat(): Amount
    {
        return $this->product->computeVAT($this->quantity);
    }

    public function computePriceWithVat(): Amount
    {
        return $this->computePrice()->add($this->computeVat());
    }

    public function getId(): string
    {
        return $this->id;
    }
}
