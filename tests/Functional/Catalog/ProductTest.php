<?php

namespace App\Tests\Functional\Catalog;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductTest extends WebTestCase
{
    public function testProduct(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/products');
        $this->assertResponseIsSuccessful();

        $response = $client->getResponse();
        $content = json_decode(
            $response->getContent(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $id = $content['hydra:member'][0]['id'];

        $client->request('GET', "/api/products/{$id}");
        $this->assertResponseIsSuccessful();
    }

    public function testProductCreation(): void
    {
        $client = static::createClient();
        $client->jsonRequest(
            'POST',
            '/api/products',
            [
                'reference' => 'reference',
                'name' => 'name',
                'description' => 'description',
                'price' => 30.00,
                'vat' => 0.20,
            ]);
        $this->assertResponseIsSuccessful();

        $response = $client->getResponse();
        $content = json_decode(
            $response->getContent(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $id = $content['id'];

        $client->request('GET', "/api/products/{$id}");
        $this->assertResponseIsSuccessful();
    }
}
