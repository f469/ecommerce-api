<?php

namespace App\Domain\Order;

use Symfony\Component\Uid\Uuid;

class Cart
{
    private string $id;
    /**
     * @var array<CartLine>
     */
    private array $lines;

    public function __construct()
    {
        $this->id = Uuid::v7();
    }

    public function addLine(CartLine $cartLine): void
    {
        $this->lines[] = $cartLine;
    }
}
