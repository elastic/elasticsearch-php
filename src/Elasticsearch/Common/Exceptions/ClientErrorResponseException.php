<?php

declare(strict_types = 1);

namespace Elasticsearch\Common\Exceptions;

/**
 * Class ClientErrorResponseException
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClientErrorResponseException extends TransportException implements ElasticsearchException
{
}
