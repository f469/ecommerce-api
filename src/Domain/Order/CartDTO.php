<?php

namespace App\Domain\Order;

class CartDTO
{
    private ?string $id;

    public function __construct(?string $id)
    {
        $this->id = $id;
    }
}
