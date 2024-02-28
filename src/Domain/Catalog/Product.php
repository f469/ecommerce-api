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
}
