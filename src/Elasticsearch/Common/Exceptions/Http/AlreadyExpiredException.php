<?php

namespace Elasticsearch\Common\Exceptions\Http;

use Elasticsearch\Common\Exceptions\HttpException;

/**
 * AlreadyExpiredException, thrown when a document has already expired
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class AlreadyExpiredException extends HttpException
{
}
