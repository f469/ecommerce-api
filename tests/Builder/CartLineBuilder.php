<?php

namespace App\Tests\Builder;

use App\Domain\Catalog\Product;
use App\Domain\Order\CartLine;

class CartLineBuilder
{
    private ?Product $product = null;
    private int $quantity = 1;

    public static function create(): self
    {
        return new self();
    }

    public function withProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function withQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function build(): CartLine
    {
        return new CartLine(
            null === $this->product ? ProductBuilder::create()->build() : $this->product,
            $this->quantity
        );
    }
}
