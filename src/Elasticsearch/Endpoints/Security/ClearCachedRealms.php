<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Security;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ClearCachedRealms
 * Elasticsearch API name security.clear_cached_realms
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClearCachedRealms extends AbstractEndpoint
{
    protected $realms;

    public function getURI(): string
    {
        $realms = $this->realms ?? null;

        if (isset($realms)) {
            return "/_security/realm/$realms/_clear_cache";
        }
        throw new RuntimeException('Missing parameter for the endpoint security.clear_cached_realms');
    }

    public function getParamWhitelist(): array
    {
        return [
            'usernames'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function setRealms($realms): ClearCachedRealms
    {
        if (isset($realms) !== true) {
            return $this;
        }
        if (is_array($realms) === true) {
            $realms = implode(",", $realms);
        }
        $this->realms = $realms;

        return $this;
    }
}
