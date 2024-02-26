<?php

namespace App\UseCase\Catalog;

class ViewProduct
{
    public string $id;
    public string $reference;
    public string|null $name;
    public string|null $description;
    public float $price;
    public float $vat;
}
