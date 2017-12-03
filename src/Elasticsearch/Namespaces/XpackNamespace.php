<?php

namespace Elasticsearch\Namespaces;

/**
 * Class XpackNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class XpackNamespace extends AbstractNamespace
{

    /**
     * $param['categories']    = (list) A comma-separated list of the information categories to include in the response. For example, build,license,features
     *       ['human']        = (boolean) Defines whether additional human-readable information is included in the response. In particular, it adds descriptions and a tag line. The default value is true.
     * @param array $params Associative array of parameters
     * @return array
     */
    public function get($params = array())
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Xpack\Get $endpoint */
        $endpoint = $endpointBuilder('Xpack\Get');

        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['username'] = (string) A comma-separated list of an identifier for the user. If you omit this parameter, it retrieves information about all users.
     * @param array $params Associative array of parameters
     * @return array
     */
    public function getUser($params = array())
    {
        $username = $this->extractArgument($params, 'username');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Xpack\Security\User\Get $endpoint */
        $endpoint = $endpointBuilder('Xpack\Security\User\Get');
        $endpoint->setUsername($username)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['username']  = (string) An identifier for the user. (Required)
     *        ['email']     = (string) The email of the user.
     *        ['full_name'] = (string) The full name of the user.
     *        ['metadata']  = (object) Arbitrary metadata that you want to associate with the user.
     *        ['password']  = (string) The user’s password. Passwords must be at least 6 characters long. (Required)
     *        ['roles']     = (list) A set of roles the user has. The roles determine the user’s access permissions. (Required)
     * @param array $params Associative array of parameters
     * @return array
     */
    public function createUser($params)
    {
        $username = $this->extractArgument($params, 'username');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Xpack\Security\User\Post $endpoint */
        $endpoint = $endpointBuilder('Xpack\Security\User\Post');
        $endpoint->setUsername($username)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['username']  = (string) An identifier for the user. (Required)
     *        ['email']     = (string) The email of the user.
     *        ['full_name'] = (string) The full name of the user.
     *        ['metadata']  = (object) Arbitrary metadata that you want to associate with the user.
     *        ['roles']     = (list) A set of roles the user has. The roles determine the user’s access permissions. (Required)
     * @param array $params Associative array of parameters
     * @return array
     */
    public function updateUser($params)
    {
        $username = $this->extractArgument($params, 'username');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Xpack\Security\User\Put $endpoint */
        $endpoint = $endpointBuilder('Xpack\Security\User\Put');
        $endpoint->setUsername($username)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['username']  = (string) An identifier for the user. (Required)
     * @param array $params Associative array of parameters
     * @return array
     */
    public function deleteUser($params)
    {
        $username = $this->extractArgument($params, 'username');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Xpack\Security\User\Delete $endpoint */
        $endpoint = $endpointBuilder('Xpack\Security\User\Delete');
        $endpoint->setUsername($username)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['username']  = (string) An identifier for the user. (Required)
     * @param array $params Associative array of parameters
     * @return array
     */
    public function enableUser($params)
    {
        $username = $this->extractArgument($params, 'username');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Xpack\Security\User\Enable $endpoint */
        $endpoint = $endpointBuilder('Xpack\Security\User\Enable');
        $endpoint->setUsername($username)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['username']  = (string) An identifier for the user. (Required)
     * @param array $params Associative array of parameters
     * @return array
     */
    public function disableUser($params)
    {
        $username = $this->extractArgument($params, 'username');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Xpack\Security\User\Disable $endpoint */
        $endpoint = $endpointBuilder('Xpack\Security\User\Disable');
        $endpoint->setUsername($username)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

}
