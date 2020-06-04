<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteVotingConfigExclusions
 * Elasticsearch API name cluster.delete_voting_config_exclusions
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteVotingConfigExclusions extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_cluster/voting_config_exclusions";
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_removal'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
}
