<?php
/**
 * User: zach
 * Date: 5/6/13
 * Time: 4:48 PM
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
namespace Elasticsearch\Common\Exceptions;

/**
 * BadMethodCallException
 * Denote problems with a method call (e.g. incorrect number of arguments)
 */
class MaxRetriesException extends \Exception implements ElasticsearchException
{
}
