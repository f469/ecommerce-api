<?php

namespace App\Tests\DataFixtures;

use App\Tests\Builder\CartBuilder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CartFixtures extends Fixture
{
    private const int DEFAULT = 30;

    public function load(ObjectManager $manager): void
    {
        foreach ($this->generate() as $cart) {
            $manager->persist($cart);
        }

        $manager->flush();
    }

    private function generate(): iterable
    {
        for ($i = 1; $i <= self::DEFAULT; ++$i) {
            yield CartBuilder::create()
                ->build();
        }
    }
}
