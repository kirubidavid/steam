<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use Test\TestCase;

class EndpointTest extends TestCase
{

    /** @test */
    public function get_home_end_point() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:8181/public/');
        $this->assertEquals(200, $response->getStatusCode());
    }

}