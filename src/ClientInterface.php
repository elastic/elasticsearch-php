<?php
/**
 * Elasticsearch PHP Client interface
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Elasticsearch;

use Elastic\Elasticsearch\Endpoints\AsyncSearch;
use Elastic\Elasticsearch\Endpoints\Autoscaling;
use Elastic\Elasticsearch\Endpoints\Cat;
use Elastic\Elasticsearch\Endpoints\Ccr;
use Elastic\Elasticsearch\Endpoints\Cluster;
use Elastic\Elasticsearch\Endpoints\DanglingIndices;
use Elastic\Elasticsearch\Endpoints\Enrich;
use Elastic\Elasticsearch\Endpoints\Eql;
use Elastic\Elasticsearch\Endpoints\Features;
use Elastic\Elasticsearch\Endpoints\Fleet;
use Elastic\Elasticsearch\Endpoints\Graph;
use Elastic\Elasticsearch\Endpoints\Ilm;
use Elastic\Elasticsearch\Endpoints\Indices;
use Elastic\Elasticsearch\Endpoints\Ingest;
use Elastic\Elasticsearch\Endpoints\License;
use Elastic\Elasticsearch\Endpoints\Logstash;
use Elastic\Elasticsearch\Endpoints\Migration;
use Elastic\Elasticsearch\Endpoints\Ml;
use Elastic\Elasticsearch\Endpoints\Monitoring;
use Elastic\Elasticsearch\Endpoints\Nodes;
use Elastic\Elasticsearch\Endpoints\Rollup;
use Elastic\Elasticsearch\Endpoints\SearchableSnapshots;
use Elastic\Elasticsearch\Endpoints\Security;
use Elastic\Elasticsearch\Endpoints\Shutdown;
use Elastic\Elasticsearch\Endpoints\Slm;
use Elastic\Elasticsearch\Endpoints\Snapshot;
use Elastic\Elasticsearch\Endpoints\Sql;
use Elastic\Elasticsearch\Endpoints\Ssl;
use Elastic\Elasticsearch\Endpoints\Tasks;
use Elastic\Elasticsearch\Endpoints\TextStructure;
use Elastic\Elasticsearch\Endpoints\Transform;
use Elastic\Elasticsearch\Endpoints\Watcher;
use Elastic\Elasticsearch\Endpoints\Xpack;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Transport\Transport;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;

interface ClientInterface
{
    /**
     * ClientEndpointsTrait
     */
    public function bulk(array $params = []);

    public function clearScroll(array $params = []);

    public function closePointInTime(array $params = []);

    public function count(array $params = []);

    public function create(array $params = []);

    public function delete(array $params = []);

    public function deleteByQuery(array $params = []);

    public function deleteByQueryRethrottle(array $params = []);

    public function deleteScript(array $params = []);

    public function exists(array $params = []);

    public function existsSource(array $params = []);

    public function explain(array $params = []);

    public function fieldCaps(array $params = []);

    public function get(array $params = []);

    public function getScript(array $params = []);

    public function getScriptContext(array $params = []);

    public function getScriptLanguages(array $params = []);

    public function index(array $params = []);

    public function info(array $params = []);

    public function knnSearch(array $params = []);

    public function mget(array $params = []);

    public function msearch(array $params = []);

    public function msearchTemplate(array $params = []);

    public function mtermvectors(array $params = []);

    public function openPointInTime(array $params = []);

    public function ping(array $params = []);

    public function putScript(array $params = []);

    public function rankEval(array $params = []);

    public function reindex(array $params = []);

    public function reindexRethrottle(array $params = []);

    public function renderSearchTemplate(array $params = []);

    public function scriptsPainlessExecute(array $params = []);

    public function scroll(array $params = []);

    public function search(array $params = []);

    public function searchMvt(array $params = []);

    public function searchShards(array $params = []);

    public function searchTemplate(array $params = []);

    public function termsEnum(array $params = []);

    public function termvectors(array $params = []);

    public function update(array $params = []);

    public function updateByQuery(array $params = []);

    public function updateByQueryRethrottle(array $params = []);

    /**
     * NamespaceTrait
     */
    public function asyncSearch(): AsyncSearch;

    public function autoscaling(): Autoscaling;

    public function cat(): Cat;

    public function ccr(): Ccr;

    public function cluster(): Cluster;

    public function danglingIndices(): DanglingIndices;

    public function enrich(): Enrich;

    public function eql(): Eql;

    public function features(): Features;

    public function fleet(): Fleet;

    public function graph(): Graph;

    public function ilm(): Ilm;

    public function indices(): Indices;

    public function ingest(): Ingest;

    public function license(): License;

    public function logstash(): Logstash;

    public function migration(): Migration;

    public function ml(): Ml;

    public function monitoring(): Monitoring;

    public function nodes(): Nodes;

    public function rollup(): Rollup;

    public function searchableSnapshots(): SearchableSnapshots;

    public function security(): Security;

    public function shutdown(): Shutdown;

    public function slm(): Slm;

    public function snapshot(): Snapshot;

    public function sql(): Sql;

    public function ssl(): Ssl;

    public function tasks(): Tasks;

    public function textStructure(): TextStructure;

    public function transform(): Transform;

    public function watcher(): Watcher;

    public function xpack(): Xpack;

    /**
     * Client
     */
    public function getTransport(): Transport;

    public function getLogger(): LoggerInterface;

    /**
     * Set the asyncronous HTTP request
     */
    public function setAsync(bool $async): self;

    /**
     * Get the asyncronous HTTP request setting
     */
    public function getAsync(): bool;

    /**
     * Enable or disable the x-elastic-client-meta header
     */
    public function setElasticMetaHeader(bool $active): self;

    /**
     * Get the status of x-elastic-client-meta header
     */
    public function getElasticMetaHeader(): bool;

    /**
     * Enable or disable the response Exception
     */
    public function setResponseException(bool $active): self;

    /**
     * Get the status of response Exception
     */
    public function getResponseException(): bool;

    /**
     * Send the HTTP request using the Elastic Transport.
     * It manages syncronous and asyncronus requests using Client::getAsync()
     *
     * @return Elasticsearch|Promise
     */
    public function sendRequest(RequestInterface $request);
}