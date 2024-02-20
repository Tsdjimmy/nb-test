<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }

    public function testCreateUserEndpoint()
    {
        $client = static::createClient();
        $client->request('POST', '/users', [], [], [], json_encode(['email' => 'test@example.com', 'firstName' => 'John', 'lastName' => 'Doe']));

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

}
