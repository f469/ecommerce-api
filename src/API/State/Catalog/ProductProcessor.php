<?php

namespace App\API\State\Catalog;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Domain\Catalog\Product;
use App\Domain\Catalog\ProductDTO;
use App\Utils\UuidGenerator;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class ProductProcessor implements ProcessorInterface
{
    public function __construct(
        #[Autowire(service: 'api_platform.doctrine.orm.state.persist_processor')]
        private ProcessorInterface $persistProcessor
    ) {
    }

    public function process(
        mixed $data,
        Operation $operation,
        array $uriVariables = [],
        array $context = []
    ): ProductDTO {
        $product = new Product($data, new UuidGenerator());
        $persisted = $this->persistProcessor->process($product, $operation, $uriVariables, $context);
        return $persisted->data();
    }
}
