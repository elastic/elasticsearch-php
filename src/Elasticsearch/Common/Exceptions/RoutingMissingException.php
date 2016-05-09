<?php

namespace Elasticsearch\Common\Exceptions;

/**
 * RoutingMissingException, thrown on when a routing value is required but
 * not provided
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RoutingMissingException extends ServerErrorResponseException implements ElasticsearchException
{
}
