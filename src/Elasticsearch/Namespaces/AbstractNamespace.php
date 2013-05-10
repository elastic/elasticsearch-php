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
    protected $transport;


    /**
     * Abstract constructor
     *
     * @param Transport $transport Transport object
     */
    public function __construct($transport)
    {
        $this->transport = $transport;

    }//end __construct()


    /**
     * Check if param is in whitelist
     *
     * @param array $params    Assoc array of parameters
     * @param array $whitelist Whitelist of keys
     *
     * @throws UnexpectedValueException
     * @return void
     */
    protected function checkParamWhitelist($params, $whitelist)
    {
        if (isset($params) !== true) {
            return; //no params, just return.
        }

        foreach ($params as $key => $value) {
            if (array_key_exists($key, $whitelist) === false) {
                throw new UnexpectedValueException($key.' is not a valid parameter');
            }
        }

    }//end checkParamWhitelist()
}