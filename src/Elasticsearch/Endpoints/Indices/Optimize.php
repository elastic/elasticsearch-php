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
 * Class Optimize
 * @package Elasticsearch\Endpoints\Indices
 */
class Optimize extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.optimize": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-optimize/",
    "methods": ["POST", "GET"],
    "url": {
      "path": "/_optimize",
      "paths": ["/_optimize", "/{index}/_optimize"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices"
        }
      },
      "params": {
        "flush": {
          "type" : "boolean",
          "description" : "Specify whether the index should be flushed after performing the operation (default: true)"
        },
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "max_num_segments": {
          "type" : "number",
          "description" : "The number of segments the index should be merged into (default: dynamic)"
        },
        "only_expunge_deletes": {
          "type" : "boolean",
          "description" : "Specify whether the operation should only expunge deleted documents"
        },
        "operation_threading": {
          "description" : "TODO: ?"
        },
        "refresh": {
          "type" : "boolean",
          "description" : "Specify whether the index should be refreshed after performing the operation (default: true)"
        },
        "wait_for_merge": {
          "type" : "boolean",
          "description" : "Specify whether the request should block until the merge process is finished (default: true)"
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
                'index is required for Optimize'
            );
        }

        $index = $this->index;
        $uri   = "/_optimize";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'flush',
            'ignore_indices',
            'max_num_segments',
            'only_expunge_deletes',
            'operation_threading',
            'refresh',
            'wait_for_merge',
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