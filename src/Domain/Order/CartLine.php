<?php

namespace App\Domain\Order;

use App\Domain\Catalog\Product;

class CartLine
{
    private string $id;
    private Product $product;
    private int $quantity;
}