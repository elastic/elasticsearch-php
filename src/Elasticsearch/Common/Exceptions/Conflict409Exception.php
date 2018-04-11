<?php

declare(strict_types = 1);

namespace Elasticsearch\Common\Exceptions;

/**
 * Conflict409Exception, thrown on 409 conflict http error
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Conflict409Exception extends \Exception implements ElasticsearchException
{
}
