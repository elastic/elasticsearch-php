<?php

namespace Iprice\Elasticsearch\Common\Exceptions;

/**
 * MaxRetriesException
 *
 * @category Elasticsearch
 * @package  Iprice\Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MaxRetriesException extends TransportException implements ElasticsearchException
{
}
