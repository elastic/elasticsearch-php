<?php
/**
 * User: zach
 * Date: 5/7/13
 * Time: 11:51 AM
 */

/**
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
namespace Elasticsearch\Common\Exceptions;

/**
 * RuntimeException
 */
class RuntimeException extends \RuntimeException implements ElasticsearchException
{
}
