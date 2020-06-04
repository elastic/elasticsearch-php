<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Watcher;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AckWatch
 * Elasticsearch API name watcher.ack_watch
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class AckWatch extends AbstractEndpoint
{
    protected $watch_id;
    protected $action_id;

    public function getURI(): string
    {
        if (isset($this->watch_id) !== true) {
            throw new RuntimeException(
                'watch_id is required for ack_watch'
            );
        }
        $watch_id = $this->watch_id;
        $action_id = $this->action_id ?? null;

        if (isset($action_id)) {
            return "/_watcher/watch/$watch_id/_ack/$action_id";
        }
        return "/_watcher/watch/$watch_id/_ack";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function setWatchId($watch_id): AckWatch
    {
        if (isset($watch_id) !== true) {
            return $this;
        }
        $this->watch_id = $watch_id;

        return $this;
    }

    public function setActionId($action_id): AckWatch
    {
        if (isset($action_id) !== true) {
            return $this;
        }
        if (is_array($action_id) === true) {
            $action_id = implode(",", $action_id);
        }
        $this->action_id = $action_id;

        return $this;
    }
}
