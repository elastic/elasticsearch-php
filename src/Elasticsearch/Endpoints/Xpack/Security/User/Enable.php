<?php

namespace Elasticsearch\Endpoints\Xpack\Security\User;

use Elasticsearch\Common\Exceptions;

/**
 * Class Enable
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Xpack\Security\User
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Enable extends AbstractUserEndpoint
{

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array();
    }

    /**
     * @return string
     */
    public function getURI()
    {
        if (isset($this->username) !== true) {
            throw new Exceptions\RuntimeException(
                'username is required for Enable'
            );
        }

        return "/_xpack/security/user/$this->username/_enable";
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'PUT';
    }
}
