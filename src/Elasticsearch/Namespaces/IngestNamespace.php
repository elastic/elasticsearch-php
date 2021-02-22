<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Endpoints\Ingest\Pipeline\Delete;
use Elasticsearch\Endpoints\Ingest\Pipeline\Get;
use Elasticsearch\Endpoints\Ingest\Pipeline\ProcessorGrok;
use Elasticsearch\Endpoints\Ingest\Pipeline\Put;
use Elasticsearch\Endpoints\Ingest\Simulate;

/**
 * Class IngestNamespace
 *
 */
class IngestNamespace extends AbstractNamespace
{
    /**
     * $params['master_timeout']             = (time) Explicit operation timeout for connection to master node
     *        ['timeout']                    = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    public function deletePipeline($params = array())
    {
        $id = $this->extractArgument($params, 'id');

        /** @var callable $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var Delete $endpoint */
        $endpoint = $endpointBuilder('Ingest\Pipeline\Delete');
        $endpoint->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout']             = (time) Explicit operation timeout for connection to master node
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    public function getPipeline($params = array())
    {
        $id = $this->extractArgument($params, 'id');

        /** @var callable $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var Get $endpoint */
        $endpoint = $endpointBuilder('Ingest\Pipeline\Get');
        $endpoint->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout']             = (time) Explicit operation timeout for connection to master node
     *        ['timeout']                    = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    public function putPipeline($params = array())
    {
        $body = $this->extractArgument($params, 'body');
        $id = $this->extractArgument($params, 'id');

        /** @var callable $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var Put $endpoint */
        $endpoint = $endpointBuilder('Ingest\Pipeline\Put');
        $endpoint->setID($id)
            ->setBody($body)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['verbose'] = (bool) Verbose mode. Display data output for each processor in executed pipeline
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    public function simulate($params = array())
    {
        $body = $this->extractArgument($params, 'body');
        $id = $this->extractArgument($params, 'id');

        /** @var callable $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var Simulate $endpoint */
        $endpoint = $endpointBuilder('Ingest\Simulate');
        $endpoint->setID($id)
            ->setBody($body)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params[]
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    public function processorGrok($params = [])
    {
        /** @var callable $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var ProcessorGrok $endpoint */
        $endpoint = $endpointBuilder('Ingest\ProcessorGrok');

        return $this->performRequest($endpoint);
    }
}
