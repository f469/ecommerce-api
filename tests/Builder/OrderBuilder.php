<?php

namespace App\Tests\Builder;

use App\Domain\Order\Cart;
use App\Domain\Order\Order;
use App\Domain\Payment\Payment;
use App\Utils\UuidGenerator;

class OrderBuilder
{
    private ?Cart $cart = null;

    public static function create(): self
    {
        return new self();
    }

    public function withCart(Cart $cart): self
    {
        $this->cart = $cart;

        return $this;
    }

    public function build(): Order
    {
        return new Order(
            $this->cart ?? CartBuilder::create()->build(),
            new \DateTime('now'),
            new Payment(
                new UuidGenerator()
            ),
            new UuidGenerator()
        );
    }
}
