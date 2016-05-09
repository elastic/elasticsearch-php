<?php

namespace Elasticsearch\Common\Exceptions;

/**
 * NoDocumentsToGetException
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class NoDocumentsToGetException extends ServerErrorResponseException implements ElasticsearchException
{
}
