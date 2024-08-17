<?php

namespace OmdbPhpSdk\Api;

use OmdbPhpSdk\Api\BaseApi;

class SearchApi extends BaseApi
{
    public function getDataBySearch($search, $params = [])
    {
        $params = array_merge(['s' => urlencode($search)], $params);

        return $this->httpClient->request($params);
    }
}
