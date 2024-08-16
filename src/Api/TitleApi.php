<?php

namespace OmdbPhpSdk\Api;

use OmdbPhpSdk\Http\HttpClient;

class TitleApi
{
    protected $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getDataByTitle($title, $params = [])
    {
        $params = array_merge(['t' => urlencode($title)], $params);

        return $this->httpClient->request($params);
    }
}
