<?php

namespace App\Domain\Catalog;

class VAT
{
    private float $rate;

    public function apply(float $price): float
    {
        return $price * (1 + $this->rate);
    }
}