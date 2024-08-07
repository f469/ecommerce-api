<?php

namespace App\API\State\Catalog;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Domain\Catalog\Product;
use App\Domain\Catalog\ProductDTO;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class ProductProvider implements ProviderInterface
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
    ): ?ProductDTO {
        /**
         * @var Product $product
         */
        $product = $this->itemProvider->provide($operation, $uriVariables, $context);

        return null != $product ? $product->data() : null;
    }
}
