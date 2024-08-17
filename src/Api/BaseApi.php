<?php

namespace OmdbPhpSdk\Api;

use OmdbPhpSdk\Http\HttpClient;

class BaseApi
{
    protected $httpClient;

    public function __construct(HttpClient $httpClient = null)
    {
        $this->httpClient = $httpClient ?: new HttpClient();
    }
}
