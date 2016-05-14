<?php
namespace Elasticsearch\Helper\Nodowntime\Exceptions;


use Elasticsearch\Common\Exceptions\ElasticsearchException;

/**
 * IndexNotFoundException
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Helper\Nodowntime\Exceptions
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class IndexNotFoundException extends \Exception implements ElasticsearchException
{

}