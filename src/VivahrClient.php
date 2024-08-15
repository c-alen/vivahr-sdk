<?php

namespace VIVAHR;

use VIVAHR\Auth\Authentication;
use VIVAHR\Endpoints\Jobs;
use VIVAHR\Endpoints\Candidates;

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

    public static function candidates()
    {
        return new Candidates(self::$auth);
    }
}