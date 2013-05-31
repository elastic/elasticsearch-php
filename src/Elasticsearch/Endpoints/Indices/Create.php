<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Create
 * @package Elasticsearch\Endpoints\Indices
 */
class Create extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.create": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-create-index/",
    "methods": ["PUT", "POST"],
    "url": {
      "path": "/{index}",
      "paths": ["/{index}"],
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
    "body": {
      "description" : "The configuration for the index (`settings` and `mappings`)"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        if (isset($index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Create'
            );
        }

        $uri   = '/{index}';
        $index = $this->index;

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
        //TODO Fix Me!
        return 'PUT,POST';
    }
}