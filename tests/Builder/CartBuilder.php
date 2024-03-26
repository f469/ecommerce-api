<?php

namespace App\Tests\Builder;

use App\Domain\Order\Cart;
use App\Utils\UuidGenerator;

class CartBuilder
{
    private array $lines;

    public static function create(): self
    {
        return new self();
    }

    public function withLines(array $lines): self
    {
        foreach ($lines as $line) {
            $this->lines[] = $line;
        }

        return $this;
    }

    public function build(): Cart
    {
        $cart = new Cart(new UuidGenerator());
        foreach ($this->lines as $line) {
            $cart->addLine($line);
        }

        return $cart;
    }
}
