<?php

namespace App\Tests\DataFixtures;

use App\Tests\Builder\OrderBuilder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrderFixtures extends Fixture
{
    private const int DEFAULT = 30;

    public function load(ObjectManager $manager): void
    {
        foreach ($this->generate() as $order) {
            $manager->persist($order);
        }

        $manager->flush();
    }

    private function generate(): iterable
    {
        for ($i = 1; $i <= self::DEFAULT; ++$i) {
            yield OrderBuilder::create()
                ->build();
        }
    }
}
