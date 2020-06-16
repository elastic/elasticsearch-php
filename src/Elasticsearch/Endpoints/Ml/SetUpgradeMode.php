<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class SetUpgradeMode
 * Elasticsearch API name ml.set_upgrade_mode
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SetUpgradeMode extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_ml/set_upgrade_mode";
    }

    public function getParamWhitelist(): array
    {
        return [
            'enabled',
            'timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
