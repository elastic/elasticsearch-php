<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Security;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ClearCachedPrivileges
 * Elasticsearch API name security.clear_cached_privileges
 * Generated running $ php util/GenerateEndpoints.php 7.9
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClearCachedPrivileges extends AbstractEndpoint
{
    protected $application;

    public function getURI(): string
    {
        $application = $this->application ?? null;

        if (isset($application)) {
            return "/_security/privilege/$application/_clear_cache";
        }
        throw new RuntimeException('Missing parameter for the endpoint security.clear_cached_privileges');
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function setApplication($application): ClearCachedPrivileges
    {
        if (isset($application) !== true) {
            return $this;
        }
        if (is_array($application) === true) {
            $application = implode(",", $application);
        }
        $this->application = $application;

        return $this;
    }
}
