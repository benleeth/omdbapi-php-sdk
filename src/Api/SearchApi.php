<?php

namespace OmdbPhpSdk\Api;

use OmdbPhpSdk\Http\HttpClient;

class SearchApi
{
    protected $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getDataBySearch($search, $params = [])
    {
        $params = array_merge(['s' => urlencode($search)], $params);

        return $this->httpClient->request($params);
    }
}
