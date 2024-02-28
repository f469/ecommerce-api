<?php

namespace App\Tests\Domain\Money;

use App\Domain\Money\Amount;
use PHPUnit\Framework\TestCase;

class AmountTest extends TestCase
{
    /**
     * @dataProvider stringAmountProvider
     */
    public function testToString($input, $output): void {
        $amount = new Amount($input);
        $this->assertEquals($output, $amount->toString());
    }

    public function stringAmountProvider(): array
    {
        return [
            ['0', 0],
            ['0,0', 0.0],
            ['0.0', 0.0],
            ['0.23', 0.23],
            ['0.025', 0.03],
            ['0.022', 0.02],
            ['0.028', 0.03],
        ];
    }
}
