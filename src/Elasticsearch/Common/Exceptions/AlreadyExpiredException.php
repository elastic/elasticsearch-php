<?php
/**
 * User: zach
 * Date: 7/23/13
 * Time: 2:32 PM
 */

namespace Elasticsearch\Common\Exceptions;

/**
 * AlreadyExpiredException, thrown when a document has already expired
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class AlreadyExpiredException extends \Exception implements ElasticsearchException
{
}
