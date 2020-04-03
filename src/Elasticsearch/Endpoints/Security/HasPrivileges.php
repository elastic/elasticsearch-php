<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class HasPrivileges
 * Elasticsearch API name security.has_privileges
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class HasPrivileges extends AbstractEndpoint
{
    protected $user;

    public function getURI(): string
    {
        $user = $this->user ?? null;

        if (isset($user)) {
            return "/_security/user/$user/_has_privileges";
        }
        return "/_security/user/_has_privileges";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }

    public function setBody($body): HasPrivileges
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setUser($user): HasPrivileges
    {
        if (isset($user) !== true) {
            return $this;
        }
        $this->user = $user;

        return $this;
    }
}
