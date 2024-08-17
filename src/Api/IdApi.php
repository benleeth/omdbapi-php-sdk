<?php

namespace OmdbPhpSdk\Api;

use OmdbPhpSdk\Api\BaseApi;

class IdApi extends BaseApi
{
    public function getDataById($id, $params = [])
    {
        $params = array_merge(['i' => $id], $params);

        return $this->httpClient->request($params);
    }
}
