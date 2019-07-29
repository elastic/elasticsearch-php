<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Helper;

use Elasticsearch\Common\Exceptions\ElasticCloudIdParseException;

/**
 * Class ElasticCloudIdParser
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Helper
 * @author   Philip Krauss <philip.krauss@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ElasticCloudIdParser
{

    /**
     * @var string
     */
    private $cloudId;

    /**
     * @var string
     */
    private $clusterName;

    /**
     * @var string
     */
    private $clusterDns;

    /**
     * @param string $cloudId
     */
    public function __construct(string $cloudId)
    {
        $this->cloudId = $cloudId;
        $this->parse();
    }

    /**
     * Get the Elastic Cloud Id
     * 
     * @return string
     */
    public function getCloudId(): string
    {
        return $this->cloudId;
    }

    /**
     * Get the Name of the Elastic Cloud Cluster
     * 
     * @return string
     */
    public function getClusterName(): string
    {
        return $this->clusterName;
    }

    /**
     * Get the DNS of the Elasticsearch Cluster
     * 
     * @return string
     */
    public function getClusterDns(): string
    {
        return $this->clusterDns;
    }

    /**
     * Parse the Elastic Cloud Params from the CloudId
     * 
     * @return void
     * 
     * @throws Elasticsearch\Common\Exceptions\ElasticCloudIdParseException
     */
    private function parse(): void
    {
        try
        {
            list($name, $encoded) = explode(':', $this->cloudId);
            list($uri, $uuids)    = explode('$', base64_decode($encoded));
            list($es,)            = explode(':', $uuids);

            $this->clusterName = $name;
            $this->clusterDns  = $es . '.' . $uri;
        }
        catch(\Throwable $t)
        {
            throw new ElasticCloudIdParseException('could not parse the Cloud ID:' . $this->cloudId);
        }
    }

}
