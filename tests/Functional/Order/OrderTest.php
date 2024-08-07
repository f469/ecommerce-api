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

        $response = $client->getResponse();
        $content = json_decode(
            $response->getContent(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $id = $content['hydra:member'][0]['id'];

        $client->request('GET', "/api/orders/{$id}");
        $this->assertResponseIsSuccessful();
    }
}
