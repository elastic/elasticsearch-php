<?php

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Fielddata.
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
 */
class Fielddata extends AbstractEndpoint
{
    // A comma-separated list of fields to return the fielddata size
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
        if (is_array($fields) === true) {
            $fields = implode(',', $fields);
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
        $uri = '/_cat/fielddata';
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
            'format',
            'bytes',
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
            'fields',
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
