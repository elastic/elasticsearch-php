<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Security;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeletePrivileges
 * Elasticsearch API name security.delete_privileges
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeletePrivileges extends AbstractEndpoint
{
    protected $application;
    protected $name;

    public function getURI(): string
    {
        $application = $this->application ?? null;
        $name = $this->name ?? null;

        if (isset($application) && isset($name)) {
            return "/_security/privilege/$application/$name";
        }
        throw new RuntimeException('Missing parameter for the endpoint security.delete_privileges');
    }

    public function getParamWhitelist(): array
    {
        return [
            'refresh'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function setApplication($application): DeletePrivileges
    {
        if (isset($application) !== true) {
            return $this;
        }
        $this->application = $application;

        return $this;
    }

    public function setName($name): DeletePrivileges
    {
        if (isset($name) !== true) {
            return $this;
        }
        $this->name = $name;

        return $this;
    }
}
