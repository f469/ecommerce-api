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

    public function toFloat(): float {
        if (is_float($this->value)) {
            return $this->value;
        }

        return (float) $this->value;
    }

    public function toString(): float {
        if (is_string($this->value)) {
            return $this->value;
        }

        return (string) $this->value;
    }
}
