<?php

namespace App\Tests\DataFixtures;

use App\Tests\Builder\ProductBuilder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    private const DEFAULT = 30;

    public function load(ObjectManager $manager): void
    {
        foreach ($this->generate() as $product) {
            $manager->persist($product);
        }

        $manager->flush();
    }

    private function generate(): iterable
    {
        for ($i = 1; $i <= self::DEFAULT; ++$i) {
            yield ProductBuilder::create()
                ->withName("Product {$i}")
                ->withReference("Ref. {$i}")
                ->withDescription(str_repeat('Lorem ipsum dolor sit amet.', 10))
                ->withVat(0.20)
                ->withPrice(50.00)
                ->build();
        }
    }
}
