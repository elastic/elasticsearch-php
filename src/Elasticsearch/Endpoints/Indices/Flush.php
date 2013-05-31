<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Flush
 * @package Elasticsearch\Endpoints\Indices
 */
class Flush extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.flush": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-flush/",
    "methods": ["POST", "GET"],
    "url": {
      "path": "/_flush",
      "paths": ["/_flush", "/{index}/_flush"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of index names; use `_all` or empty string for all indices"
        }
      },
      "params": {
        "force": {
          "type" : "boolean",
          "description" : "TODO: ?"
        },
        "full": {
          "type" : "boolean",
          "description" : "TODO: ?"
        },
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "refresh": {
          "type" : "boolean",
          "description" : "Refresh the index after performing the operation"
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

        if (isset($index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Flush'
            );
        }

        $uri   = '/_flush';
        $index = $this->index;

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'force',
            'full',
            'ignore_indices',
            'refresh',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'POST,GET';
    }
}