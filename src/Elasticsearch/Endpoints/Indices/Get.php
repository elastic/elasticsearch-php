<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Get
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    private $feature;

   /**
    * @return string
    * @throws Exceptions\RuntimeException
    */
    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Get'
            );
        }
        $index   = $this->index;
        $feature = $this->feature;
        $uri     = "/$index";

        if (isset($feature) === true) {
            $uri = "/$index/$feature";
        }

        return $uri;
    }

    public function setFeature($feature)
    {
        if (isset($feature) !== true) {
            return $this;
        }

        if (is_array($feature) === true) {
            $feature = implode(",", $feature);
        }

        $this->feature = $feature;

        return $this;
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return array(
            'local',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'human',
            'include_type_name'
        );
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'GET';
    }
}
