<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Open
 * @package Elasticsearch\Endpoints\Indices
 */
class Open extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.open": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-open-close/",
    "methods": ["POST"],
    "url": {
      "path": "/{index}/_open",
      "paths": ["/{index}/_open"],
      "parts": {
        "index": {
          "type" : "string",
          "description" : "The name of the index"
        }
      },
      "params": {
        "timeout": {
          "type" : "time",
          "description" : "Explicit operation timeout"
        }
      }
    },
    "body": null
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $uri   = "/$index/_open";

        if (isset($index) === true) {
            $uri = "";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'timeout',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}