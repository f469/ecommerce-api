<?php

namespace App\Tests\Domain\Order;

use App\Domain\Order\CartLine;
use App\Tests\Builder\CartLineBuilder;
use App\Tests\Builder\ProductBuilder;
use PHPUnit\Framework\TestCase;

class CartLineTest extends TestCase
{
    /**
     * @dataProvider provideTestCase
     */
    public function testComputation(
        int $quantity,
        float $productPrice,
        float $vatRate,
        float $expectedVatResult,
        float $expectedPriceResult,
        float $expectedPriceWithVatResult,
    ): void {
        $line = $this->createCartLine($quantity, $productPrice, $vatRate);

        $this->assertEquals($expectedPriceResult, $line->computePrice()->toFloat());
        $this->assertEquals($expectedVatResult, $line->computeVat()->toFloat());
        $this->assertEquals($expectedPriceWithVatResult, $line->computePriceWithVat()->toFloat());
    }

    public function provideTestCase(): array
    {
        return [
            [1, 54.00, 0.020, 1.08, 54.00, 55.08],
            [1, 54.51, 0.020, 1.09, 54.51, 55.60],
            [1, 54.56, 0.020, 1.09, 54.56, 55.65],

            [2, 54.00, 0.020, 2.16, 108.00, 110.16],
            [2, 54.51, 0.020, 2.18, 109.02, 111.20],
            [2, 54.56, 0.020, 2.18, 109.12, 111.30],

            [3, 54.00, 0.020, 3.24, 162.00, 165.24],
            [3, 54.51, 0.020, 3.27, 163.53, 166.80],
            [3, 54.56, 0.020, 3.27, 163.68, 166.95],
        ];
    }

    public function createCartLine(
        int $quantity,
        float $productPrice,
        float $vat): CartLine
    {
        return CartLineBuilder::create()
            ->withQuantity($quantity)
            ->withProduct(
                ProductBuilder::create()
                ->withPrice($productPrice)
                ->withVat($vat)
                ->build()
            )
            ->build();
    }
}
