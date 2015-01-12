<?php

namespace Elasticsearch\Common\Exceptions;

/**
 * Authentication401Exception, thrown on 401 authentication http error
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Authentication401Exception extends \Exception implements ElasticsearchException
{
}