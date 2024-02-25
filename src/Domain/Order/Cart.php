<?php

namespace App\Domain\Order;

class Cart
{
    private string $id;
    /**
     * @var array<CartLine>
     */
    private array $lines;
}