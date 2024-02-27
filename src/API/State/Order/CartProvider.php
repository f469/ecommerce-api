<?php

namespace App\API\State\Order;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\UseCase\Order\ViewCart;

class CartProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        // dummy
        $tmp = new ViewCart();
        $tmp->id = 'id';

        return $tmp;
    }
}
