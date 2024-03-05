<?php

namespace App\Tests\Domain\Order;

use App\Domain\Order\Cart;
use App\Tests\Builder\CartBuilder;
use App\Tests\Builder\CartLineBuilder;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testComputePriceSum(): void
    {
        $cart = $this->createCart();
        $this->assertTrue(true);
    }

    public function testComputeVatSum(): void
    {
        $this->assertTrue(true);
    }

    public function testComputePriceWithVatSum(): void
    {
        $this->assertTrue(true);
    }

    public function createCart(): Cart
    {
        return CartBuilder::create()
            ->withLines(
                [
                    CartLineBuilder::create()->build(),
                    CartLineBuilder::create()->build(),
                    CartLineBuilder::create()->build(),
                ]
            )
            ->build();
    }
}
