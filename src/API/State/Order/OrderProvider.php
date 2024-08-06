<?php

namespace App\API\State\Order;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Domain\Order\Order;
use App\Domain\Order\OrderDTO;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class OrderProvider implements ProviderInterface
{
    public function __construct(
        #[Autowire('api_platform.doctrine.orm.state.item_provider')]
        private ProviderInterface $itemProvider,
    ) {
    }

    public function provide(
        Operation $operation,
        array $uriVariables = [],
        array $context = []
    ): ?OrderDTO {
        /**
         * @var Order|null $order
         */
        $order = $this->itemProvider->provide($operation, $uriVariables, $context);

        return $order?->data();
    }
}
