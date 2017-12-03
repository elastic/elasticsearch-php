<?php

namespace Elasticsearch\Endpoints\Xpack\Security\User;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Xpack\Security\User
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{

    protected $username;

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
        $uri = '/_xpack/security/user';

        if (isset($this->username)) {
            $uri = "$uri/$this->username";
        }

        return $uri;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }


    /**
     * @param $username string
     * @return Get
     */
    public function setUsername($username)
    {
        if (isset($username) !== true) {
            return $this;
        }

        $this->username = $username;

        return $this;
    }
}