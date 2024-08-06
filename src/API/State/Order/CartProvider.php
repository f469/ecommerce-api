<?php

namespace App\API\State\Order;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Domain\Order\Cart;
use App\Domain\Order\CartDTO;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class CartProvider implements ProviderInterface
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
    ): ?CartDTO {
        /**
         * @var Cart|null $cart
         */
        $cart = $this->itemProvider->provide($operation, $uriVariables, $context);

        return $cart?->data();
    }
}
