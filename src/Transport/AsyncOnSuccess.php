<?php
/**
 * Elasticsearch PHP Client
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

namespace Elastic\Elasticsearch\Transport;

use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Transport\Async\OnSuccessInterface;
use Psr\Http\Message\ResponseInterface;

class AsyncOnSuccess implements OnSuccessInterface
{
    public function success(ResponseInterface $response, int $count): Elasticsearch
    {
        $result = new Elasticsearch;
        $result->setResponse($response, true);
        return $result;
    }
}