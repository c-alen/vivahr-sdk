<?php

namespace VIVAHR\Auth;

use VIVAHR\HttpClient\Client;

class Authentication
{
    private $clientId;
    private $clientSecret;
    private $tokenUrl;
    private $accessToken;

    public function __construct($clientId, $clientSecret, $tokenUrl)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->tokenUrl = $tokenUrl;
    }

    public function authenticate()
    {
        $client = new Client('');
        $response = $client->request('POST', $this->tokenUrl, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ]
        ]);

        $this->accessToken = $response['access_token'];
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
