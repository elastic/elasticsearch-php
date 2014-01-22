<?php
/**
 * User: zach
 * Date: 5/9/13
 * Time: 5:10 PM
 */

namespace Elasticsearch\Namespaces;

use Elasticsearch\Common\Exceptions\UnexpectedValueException;
use Elasticsearch\Transport;

/**
 * Class AbstractNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\AbstractNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
abstract class AbstractNamespace
{
    /** @var \Elasticsearch\Transport  */
    protected $transport;

    /** @var  callback */
    protected $dicEndpoints;


    /**
     * Abstract constructor
     *
     * @param Transport $transport Transport object
     * @param           $dicEndpoints
     */
    public function __construct($transport, $dicEndpoints)
    {
        $this->transport = $transport;
        $this->dicEndpoints = $dicEndpoints;
    }


    /**
     * @param array $params
     * @param string $arg
     *
     * @return null|mixed
     */
    public function extractArgument(&$params, $arg)
    {
        if (is_object($params) === true) {
            $params = (array)$params;
        }

        if (isset($params[$arg]) === true) {
            $val = $params[$arg];
            unset($params[$arg]);
            return $val;
        } else {
            return null;
        }
    }

}