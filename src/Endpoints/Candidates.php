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
        return $this->client->request('POST', $this->endpoint , ['form_params' => $data]);
    }

    public function update($id, array $data)
    {
        return $this->client->request('PUT', $this->endpoint."/{$id}", ['form_params' => $data]);
    }

    public function get($id)
    {
        return $this->client->request('GET', $this->endpoint."/{$id}");
    }

    public function list(array $data)
    {
        return $this->client->request('GET', $this->endpoint, ['json' => $data] );
    }

    public function share_internal($id, array $data)
    {
        return $this->client->request('POST', $this->endpoint."/{$id}"."/share/internal", ['form_params' => $data]);
    }

    public function share_email($id, array $data)
    {
        return $this->client->request('POST', $this->endpoint."/{$id}"."/share/email", ['form_params' => $data]);
    }

    public function share_link($id, array $data)
    {
        return $this->client->request('POST', $this->endpoint."/{$id}"."/share/link", ['form_params' => $data]);
    }

    public function send_questionnaire($id, array $data)
    {
        return $this->client->request('POST', $this->endpoint."/{$id}"."/send-questionnaire", ['form_params' => $data]);
    }

    public function decline($id, array $data)
    {
        return $this->client->request('POST', $this->endpoint."/{$id}"."/decline", ['form_params' => $data]);
    }

    public function status_stages($id)
    {
        return $this->client->request('POST', $this->endpoint."/{$id}"."/status-stages");
    }

    public function set_status_stage($id, array $data)
    {
        return $this->client->request('POST', $this->endpoint."/{$id}"."/set-status", ['form_params' => $data]);
    }

    public function add_tag($id, array $data)
    {
        return $this->client->request('POST', $this->endpoint."/{$id}"."/tag", ['form_params' => $data]);
    }

    public function delete($id)
    {
        return $this->client->request('DELETE', $this->endpoint."/{$id}");
    }
}
