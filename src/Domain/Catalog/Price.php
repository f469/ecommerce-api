<?php

namespace App\Domain\Catalog;

class Price
{
    private float $value;
    private string $currency;

    public function getValue(): float {
        return $this->value;
    }
    public function __toString(): string {
        return "{$this->value} {$this->currency}";
    }
}