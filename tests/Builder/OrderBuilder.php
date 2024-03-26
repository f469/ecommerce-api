<?php

namespace App\Tests\Builder;

use App\Domain\Order\Order;
use App\Domain\Payment\Payment;
use App\Domain\Payment\Type;
use App\Utils\UuidGenerator;

class OrderBuilder
{
    public static function create(): self
    {
        return new self();
    }

    public function build(): Order
    {
        return new Order(
            CartBuilder::create()->build(),
            new \DateTime('now'),
            new Payment(
                Type::Card,
                new UuidGenerator()
            ),
            new UuidGenerator()
        );
    }
}
