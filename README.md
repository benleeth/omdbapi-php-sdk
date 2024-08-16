
## About
A quick & dirty PHP SDK to communicate with OMDb API

## Installation
 Install via Composer:
```bash
composer require benleeth/omdb-php-sdk
```

Sign up for [OMDb API Key](https://www.omdbapi.com/apikey.aspx)

Add API key to `OMDB_API_KEY` environment variable in `.env`

## Usage
Get Data by IMDb ID
```php
use OmdbPhpSdk\Http\HttpClient;
use OmdbPhpSdk\Api\IMDbIDApi;

$client = new HttpClient();
$idApi = new IMDbIDApi($client);
$idData = $idApi->getDataById('tt0087332');

print_r($idData);
```

Get Data by Title
```php
use OmdbPhpSdk\Http\HttpClient;
use OmdbPhpSdk\Api\TitleApi;

$client = new HttpClient();
$titleApi = new TitleApi($client);
$titleData = $titleApi->getDataByTitle('Kids');

print_r($titleData);
```

Get Data with Search
```php
use OmdbPhpSdk\Http\HttpClient;
use OmdbPhpSdk\Api\SearchApi;

$client = new HttpClient();
$searchApi = new SearchApi($client);
$searchData = $searchApi->getDataBySearch('Breaking Bad');

print_r($searchData);
```

Extra Params
| Parameter | Valid Options | Default Value | Description |
| --- | --- | --- | --- |
| type | movie, series, episode | | Type of result to return |
| y | | | Year of release |
| plot | short, full | short | Return short or full plot (Not available on `OmdbPhpSdk\Api\SearchApi`) |
| page | 1-100 | 1 | Page number to return (Available on `OmdbPhpSdk\Api\SearchApi` only) |