<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetUser
 * Elasticsearch API name security.get_user
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetUser extends AbstractEndpoint
{
    protected $username;

    public function getURI(): string
    {
        $username = $this->username ?? null;

        if (isset($username)) {
            return "/_security/user/$username";
        }
        return "/_security/user";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function setUsername($username): GetUser
    {
        if (isset($username) !== true) {
            return $this;
        }
        if (is_array($username) === true) {
            $username = implode(",", $username);
        }
        $this->username = $username;

        return $this;
    }
}
