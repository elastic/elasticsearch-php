<?php

declare(strict_types = 1);

namespace Elasticsearch\Common\Exceptions;

/**
 * IndexClosedException
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Daniel Pasch-Sannapiu <gempir.dev@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class IndexClosedException extends \Exception implements ElasticsearchException
{
}
