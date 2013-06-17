<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 2:46 PM
 */

namespace Elasticsearch\Common\Exceptions\Curl;

use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Common\Exceptions\TransportException;

/**
 * Class CouldNotResolveHostException
 * @package Elasticsearch\Common\Exceptions\Curl
 */
class CouldNotResolveHostException extends TransportException implements ElasticsearchException
{
}
