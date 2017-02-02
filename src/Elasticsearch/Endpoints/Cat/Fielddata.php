<?php

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Fielddata
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
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
    public function getURI()
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
    public function getParamWhitelist()
    {
        return array(
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
            's',
            'format',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
