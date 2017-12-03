<?php

namespace Elasticsearch\Endpoints\Xpack\Security\User;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractUserEndpoint
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Xpack\Security\User
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractUserEndpoint extends AbstractEndpoint
{

    protected $username;

    /**
     * @param $username string
     * @return AbstractUserEndpoint
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
