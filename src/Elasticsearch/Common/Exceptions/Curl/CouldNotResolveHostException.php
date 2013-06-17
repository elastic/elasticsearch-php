<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 2:46 PM
 */

namespace Elasticsearch\Common\Exceptions\Curl;

use Elasticsearch\Common\Exceptions\ElasticsearchException;

/**
 * Class CouldNotResolveHostException
 * @package Elasticsearch\Common\Exceptions\Curl
 */
class CouldNotResolveHostException extends \Exception implements ElasticsearchException
{
}
