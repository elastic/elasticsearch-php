<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 * @package Elasticsearch\Endpoints\Indices\Mapping
 */
class Get extends AbstractEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {
        return $this->getOptionalURI('_mapping');
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}