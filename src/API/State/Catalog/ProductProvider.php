<?php

namespace App\API\State\Catalog;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\UseCase\Catalog\ViewProduct;

class ProductProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        // dummy
        $tmp = new ViewProduct();
        $tmp->id = 'id';
        $tmp->price = 00.00;
        $tmp->name = 'name';
        $tmp->vat = 00.00;
        $tmp->reference = 'ref';
        $tmp->description = 'desc';

        return $tmp;
    }
}
