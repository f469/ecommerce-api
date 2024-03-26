<?php

namespace App\Tests\DataFixtures;

use App\Tests\Builder\OrderBuilder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $order = OrderBuilder::create()->build();

        $manager->persist($order);
        $manager->flush();
    }
}
