<?php

namespace OmdbPhpSdk\Api;

use OmdbPhpSdk\Http\HttpClient;

class IMDbIDApi
{
    protected $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getDataById($id, $params = [])
    {
        $params = array_merge(['i' => $id], $params);

        return $this->httpClient->request($params);
    }
}
