<?php

namespace App\Domain\Catalog;

class Product
{
    private string $id;
    private string $reference;
    private string|null $name;
    private string|null $description;
    private float $price;
    private float $vat;
}
