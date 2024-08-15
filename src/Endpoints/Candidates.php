<?php

namespace VIVAHR\Endpoints;

use VIVAHR\HttpClient\Client;

class Candidates
{
    private $client;
    private $endpoint;

    public function __construct($auth)
    {
        $this->client = new Client($auth->getAccessToken());

        $this->endpoint = 'candidates';
    }

    public function create(array $data)
    {
        return $this->client->request('POST', $this->endpoint , ['json' => $data]);
    }

    public function edit($jobId, array $data)
    {
        return $this->client->request('PATCH', $this->endpoint."/{$jobId}", ['json' => $data]);
    }

    public function update($jobId, array $data)
    {
        return $this->client->request('PUT', $this->endpoint."/{$jobId}", ['json' => $data]);
    }

    public function delete($jobId)
    {
        return $this->client->request('DELETE', $this->endpoint."/{$jobId}");
    }

    public function list()
    {
        return $this->client->request('GET', $this->endpoint );
    }
}
