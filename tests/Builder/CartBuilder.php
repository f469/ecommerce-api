<?php

namespace App\Tests\Builder;

use App\Domain\Order\Cart;

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
        $cart = new Cart();
        foreach ($this->lines as $line) {
            $cart->addLine($line);
        }

        return $cart;
    }
}
