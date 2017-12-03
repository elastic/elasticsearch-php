<?php

namespace Elasticsearch\Endpoints\Xpack;


use Elasticsearch\Endpoints\AbstractEndpoint;

class Get extends AbstractEndpoint
{

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'categories',
            'human'
        );
    }

    /**
     * @return string
     */
    public function getURI()
    {
        return '/_xpack';
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}