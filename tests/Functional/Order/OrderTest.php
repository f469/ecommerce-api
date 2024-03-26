<?php

namespace App\Tests\Functional\Order;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderTest extends WebTestCase
{
    public function testOrder(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/orders');
        $this->assertResponseIsSuccessful();
    }
}
