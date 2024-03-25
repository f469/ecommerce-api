<?php

namespace App\Domain\Money;

class Amount
{
    private float $value;

    /**
     * @param float $value
     */
    public function __construct(string|float $value)
    {
        if (is_float($value)) {
            $this->value = round($value, 2);
        }
        if (is_string($value)) {
            $this->value = round((float) $value, 2);
        }
    }

    public function toFloat(): float
    {
        return $this->value;
    }

    public function toString(): string
    {
        return (string) $this->value;
    }

    public function add(self $value): self
    {
        return new Amount((float) $this->value + $value->toFloat());
    }

    public function mul(self $value): self
    {
        return new Amount((float) $this->value * $value->toFloat());
    }
}
