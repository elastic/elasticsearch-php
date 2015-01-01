<?php

namespace Elasticsearch\Common\Exceptions;

/**
 * BadRequest400Exception, thrown on 400 conflict http error
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class BadRequest400Exception extends \Exception implements ElasticsearchException
{
    public $status = 400;

    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        $buffer = json_decode($message, true);

        if (!empty($buffer) && is_array($buffer) && isset($buffer['error']) && isset($buffer['status']))
        {
            $this->status   = (int) $buffer['status'];
            $message        = $buffer['error'];
        }

        parent::__construct($message, $code, $previous);
    }
}
