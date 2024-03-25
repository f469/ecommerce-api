<?php

namespace App\Tests\Domain\Catalog;

use App\Domain\Catalog\Product;
use App\Domain\Catalog\ProductDTO;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testDummy(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @dataProvider VATProvider
     */
    public function testComputeVAT(
        float $price,
        float $vat,
        float $result): void
    {
        $product = new Product(
            new ProductDTO(
                'id',
                'ref',
                'name',
                'des',
                $price,
                $vat,
            )
        );

        $this->assertEquals($result, $product->computeVAT(1)->toFloat());
    }

    public function VATProvider(): array
    {
        return [
            [50.00, 0.20, 10.00],
            [50.36, 0.20, 10.07],
            [24.00, 0.24, 5.76],
            [24.22, 0.24, 5.81],
            [22.88, 0.28, 6.41],
        ];
    }
}
