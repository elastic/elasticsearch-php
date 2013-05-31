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
 * Class Refresh
 * @package Elasticsearch\Endpoints\Indices
 */
class Refresh extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.refresh": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-refresh/",
    "methods": ["POST", "GET"],
    "url": {
      "path": "/_refresh",
      "paths": ["/_refresh", "/{index}/_refresh"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices"
        }
      },
      "params": {
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "operation_threading": {
          "description" : "TODO: ?"
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
                'index is required for Refresh'
            );
        }

        $index = $this->index;
        $uri   = "/_refresh";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'ignore_indices',
            'operation_threading',
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