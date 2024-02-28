<?php

namespace App\Domain\Catalog;

use App\Domain\Money\Amount;

class Product
{
    private string $id;
    private string $reference;
    private string|null $name;
    private string|null $description;

    private Amount $price;
    private Amount $vat;

    /**
     * @param float $price
     * @param float $vat
     */
    public function __construct(
        string $reference,
        ?string $name,
        ?string $description,
        string|float $price,
        string|float $vat
    ) {
        $this->id = 'dummy';

        $this->reference = $reference;
        $this->name = $name;
        $this->description = $description;
        $this->price = new Amount($price);
        $this->vat = new Amount($vat);
    }

    public function computeVAT(): Amount
    {
        return $this->price->mul($this->vat);
    }
}
