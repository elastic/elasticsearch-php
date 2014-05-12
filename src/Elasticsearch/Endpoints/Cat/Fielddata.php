<?php
/**
 * User: zach
 * Date: 5/12/14
 * Time: 10:40 AM
 */

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Fielddata
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Fielddata extends AbstractEndpoint
{
    private $fields;


    /**
     * @param $fields
     *
     * @return $this
     */
    public function setFields($fields)
    {
        if (isset($fields) !== true) {
            return $this;
        }

        $this->fields = $fields;
        return $this;
    }


    /**
     * @return string
     */
    protected function getURI()
    {
        $fields = $this->fields;
        $uri   = "/_cat/fielddata";

        if (isset($fields) === true) {
            $uri = "/_cat/fielddata/$fields";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
        );
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}