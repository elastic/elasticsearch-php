<?php

namespace Elasticsearch\Endpoints\Xpack;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Xpack
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
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
