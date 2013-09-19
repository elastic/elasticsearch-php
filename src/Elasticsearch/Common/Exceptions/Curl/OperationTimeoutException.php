<?php
/**
 * User: zach
 * Date: 9/19/13
 * Time: 3:53 PM
 */

namespace Elasticsearch\Common\Exceptions\Curl;


use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Common\Exceptions\TransportException;

/**
 * Class OperationTimeoutException
 * @package Elasticsearch\Common\Exceptions\Curl
 */
class OperationTimeoutException extends TransportException implements ElasticsearchException
{
}
