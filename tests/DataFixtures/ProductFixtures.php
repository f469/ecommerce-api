<?php

namespace App\Tests\DataFixtures;

use App\Tests\Builder\ProductBuilder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = ProductBuilder::create()->build();

        $manager->persist($product);
        $manager->flush();
    }
}
