<?php

namespace OmdbPhpSdk\Api;

use OmdbPhpSdk\Api\BaseApi;

class TitleApi extends BaseApi
{
    public function getDataByTitle($title, $params = [])
    {
        $params = array_merge(['t' => urlencode($title)], $params);

        return $this->httpClient->request($params);
    }
}
