<?php

use PHPUnit\Framework\TestCase;
use OmdbPhpSdk\Api\SearchApi;
use OmdbPhpSdk\Http\HttpClient;

class SearchApiTest extends TestCase
{
    public function testGetDataById()
    {
        $willReturn = [
            ['Title' => 'Breaking Bad', 'Year' => '2008–2013', 'Type' => 'series'],
            ['Title' => 'El Camino: A Breaking Bad Movie', 'Year' => '2019', 'Type' => 'movie']
        ];

        $httpClient = $this->createMock(HttpClient::class);
        $httpClient->method('request')
                   ->willReturn($willReturn);

        $searchApi = new SearchApi($httpClient);
        $searchData = $searchApi->getDataBySearch('Breaking Bad');

        $this->assertEquals('Breaking Bad', $searchData[0]['Title']);
        $this->assertEquals('2008–2013', $searchData[0]['Year']);
        $this->assertEquals('series', $searchData[0]['Type']);
        $this->assertEquals('El Camino: A Breaking Bad Movie', $searchData[1]['Title']);
        $this->assertEquals('2019', $searchData[1]['Year']);
        $this->assertEquals('movie', $searchData[1]['Type']);
    }
}
