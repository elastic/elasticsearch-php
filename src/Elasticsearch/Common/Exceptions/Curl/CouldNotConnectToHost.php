<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 3:14 PM
 */

namespace Elasticsearch\Common\Exceptions\Curl;

use Elasticsearch\Common\Exceptions\ElasticsearchException;

/**
 * Class CouldNotConnectToHost
 * @package Elasticsearch\Common\Exceptions\Curl
 */
class CouldNotConnectToHost extends \Exception implements ElasticsearchException
{
}
