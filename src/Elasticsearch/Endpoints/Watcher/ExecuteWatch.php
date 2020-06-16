<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Watcher;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ExecuteWatch
 * Elasticsearch API name watcher.execute_watch
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ExecuteWatch extends AbstractEndpoint
{

    public function getURI(): string
    {
        $id = $this->id ?? null;

        if (isset($id)) {
            return "/_watcher/watch/$id/_execute";
        }
        return "/_watcher/watch/_execute";
    }

    public function getParamWhitelist(): array
    {
        return [
            'debug'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function setBody($body): ExecuteWatch
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }
}
