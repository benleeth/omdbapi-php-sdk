<?php

namespace OmdbPhpSdk\Http;

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use OmdbPhpSdk\Exceptions\ApiException;

class HttpClient
{
    protected $client;
    private $apiKey;

    public function __construct()
    {
        $this->load_environment_variables();
        $this->apiKey = $_ENV['OMDB_API_KEY'];

        $this->client = new Client([
            'base_uri' => 'https://www.omdbapi.com',
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function request($params = [])
    {
        $key = [
            'query' => [
                'apikey' => $this->apiKey
            ]
        ];

        $params = array_merge($key, ['query' => $params]);

        try {
            $response = $this->client->request('GET', '/', $params);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            throw new ApiException($e->getMessage(), $e->getCode());
        }
    }

    private function load_environment_variables()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }
}
