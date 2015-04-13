<?php

namespace Elasticsearch\Common\Exceptions\Curl;

use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Common\Exceptions\TransportException;

/**
 * Class CouldNotConnectToHost
 * @package Elasticsearch\Common\Exceptions\Curl
 */
class CouldNotConnectToHost extends TransportException implements ElasticsearchException
{
}
