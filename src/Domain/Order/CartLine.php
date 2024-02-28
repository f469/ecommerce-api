<?php

namespace App\Domain\Order;

use App\Domain\Catalog\Product;
use Symfony\Component\Uid\Uuid;

class CartLine
{
    private string $id;
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->id = Uuid::v7();

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
}
