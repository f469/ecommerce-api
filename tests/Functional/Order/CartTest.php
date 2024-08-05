<?php

namespace App\Tests\Functional\Order;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CartTest extends WebTestCase
{
    public function testCart(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/carts');
        $this->assertResponseIsSuccessful();

        $response = $client->getResponse();
        $content = json_decode(
            $response->getContent(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $id = $content['hydra:member'][0]['id'];

        $client->request('GET', "/api/carts/{$id}");
        $this->assertResponseIsSuccessful();
    }
}
