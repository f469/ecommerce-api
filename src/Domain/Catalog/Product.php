<?php

namespace App\Domain\Catalog;

class Product
{
    private string $reference;
    private string|null $name;
    private string|null $description;
    private Price $price;
    private VAT $vat;
}