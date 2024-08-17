<?php

use PHPUnit\Framework\TestCase;
use OmdbPhpSdk\Api\TitleApi;
use OmdbPhpSdk\Http\HttpClient;

class TitleApiTest extends TestCase
{
    public function testGetDataById()
    {
        $httpClient = $this->createMock(HttpClient::class);
        $httpClient->method('request')
                   ->willReturn(['Title' => 'Kids', 'Year' => '1995', 'Rated' => 'NC-17']);

        $titleApi = new TitleApi($httpClient); // Inject the mock

        $titleData = $titleApi->getDataByTitle('Kids', ['y' => '1995', 'type' => 'movie']);

        $this->assertEquals('Kids', $titleData['Title']);
        $this->assertEquals('1995', $titleData['Year']);
        $this->assertEquals('NC-17', $titleData['Rated']);
    }
}
