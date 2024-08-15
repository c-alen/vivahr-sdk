<?php

namespace VIVAHR;

use VIVAHR\Auth\Authentication;
use VIVAHR\Endpoints\Jobs;

class VivahrClient
{
    private static $clientId;
    private static $clientSecret;
    private static $tokenUrl = 'https://api.vivahr.local/oauth/token';
    private static $auth;

    public static function init($clientId, $clientSecret, $tokenUrl = null)
    {
        self::$clientId = $clientId;
        self::$clientSecret = $clientSecret;
        self::$tokenUrl = $tokenUrl ?: self::$tokenUrl;

        self::$auth = new Authentication(self::$clientId, self::$clientSecret, self::$tokenUrl);
        self::$auth->authenticate();
    }

    public static function jobs()
    {
        return new Jobs(self::$auth);
    }
}


/*
namespace VIVAHR;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use VIVAHR\Exceptions\ApiException;

class VivahrClient
{
    protected $httpClient;
    protected $baseUrl;
    protected $clientId;
    protected $clientSecret;
    protected $accessToken;

    public function __construct($clientId, $clientSecret, $baseUrl)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->httpClient = new HttpClient([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function authenticate($username, $password, $scope = '')
    {
        try {
            $response = $this->httpClient->post('/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'username' => $username,
                    'password' => $password,
                    'scope' => $scope,
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            $this->accessToken = $data['access_token'];
            $this->httpClient = new HttpClient([
                'base_uri' => $this->baseUrl,
                'headers' => [
                    'Authorization' => "Bearer {$this->accessToken}",
                    'Accept' => 'application/json',
                ]
            ]);

            return $data;
        } catch (RequestException $e) {
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    // Other methods (get, post, put, delete) remain the same...
}

*/