<?php

namespace App\API\State\Order;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\UseCase\Order\ViewOrder;

class OrderProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        // dummy
        $tmp = new ViewOrder();
        $tmp->id = 'id';

        return $tmp;
    }
}
