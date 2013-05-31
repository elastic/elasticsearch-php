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
 * Class Close
 * @package Elasticsearch\Endpoints\Indices
 */
class Close extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.close": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-open-close/",
    "methods": ["POST"],
    "url": {
      "path": "/{index}/_close",
      "paths": ["/{index}/_close"],
      "parts": {
        "index": {
          "type" : "string",
          "required" : true,
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

        if (isset($this->index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Close'
            );
        }

        $index = $this->index;
        $uri   = "/$index/_close";

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