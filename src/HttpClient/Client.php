<?php

namespace VIVAHR\HttpClient;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    private $client;

    public function __construct($authToken)
    {
        $this->client = new GuzzleClient([
            'base_uri' => 'https://api.vivahr.local/',
            'headers' => [
                'Authorization' => 'Bearer ' . $authToken,
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function request($method, $uri, $options = [])
    {
        $response = $this->client->request($method, $uri, $options);
        return json_decode($response->getBody(), true);
    }
}
