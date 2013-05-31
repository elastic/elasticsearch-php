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
 * Class Status
 * @package Elasticsearch\Endpoints\Indices
 */
class Status extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.status": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-indices-status/",
    "methods": ["GET"],
    "url": {
      "path": "/_status",
      "paths": ["/_status", "/{index}/_status"],
      "parts": {
        "index": {
          "type" : "list",
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
        },
        "recovery": {
          "type" : "boolean",
          "description" : "Return information about shard recovery"
        },
        "snapshot": {
          "type" : "boolean",
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

        $uri   = '/_status';
        $index = $this->index;

        if (isset($index) === true) {
            $uri = "/$index/_status";
        }
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
            'recovery',
            'snapshot',
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