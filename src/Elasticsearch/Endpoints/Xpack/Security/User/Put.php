<?php

namespace Elasticsearch\Endpoints\Xpack\Security\User;

use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Xpack\Security\User
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Put extends AbstractUserEndpoint
{

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'email',
            'full_name',
            'metadata',
            'roles'
        );
    }

    /**
     * @return string
     */
    public function getURI()
    {
        if (isset($this->username) !== true) {
            throw new Exceptions\RuntimeException(
                'username is required for Put'
            );
        }

        return "/_xpack/security/user/$this->username";
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'PUT';
    }
}