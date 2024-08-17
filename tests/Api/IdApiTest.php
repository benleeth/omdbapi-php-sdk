<?php

use PHPUnit\Framework\TestCase;
use OmdbPhpSdk\Api\IdApi;
use OmdbPhpSdk\Http\HttpClient;

class IdApiTest extends TestCase
{
    public function testGetDataById()
    {
        $httpClient = $this->createMock(HttpClient::class);
        $httpClient->method('request')
                   ->willReturn(['Title' => 'Ghostbusters', 'Year' => '1984', 'Rated' => 'PG']);

        $idApi = new IdApi($httpClient); // Inject the mock

        $idData = $idApi->getDataById('tt0087332');

        $this->assertEquals('Ghostbusters', $idData['Title']);
        $this->assertEquals('1984', $idData['Year']);
        $this->assertEquals('PG', $idData['Rated']);
    }
}
