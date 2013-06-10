<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Delete_By_Query
 * @package Elasticsearch\Endpoints
 */
class Delete_By_Query extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "delete_by_query": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/delete-by-query/",
    "methods": ["DELETE"],
    "url": {
      "path": "/{index}/_query",
      "paths": ["/{index}/_query", "/{index}/{type}/_query"],
      "parts": {
        "index": {
          "type" : "list",
          "required": true,
          "description" : "A comma-separated list of indices to restrict the operation"
        },
        "type": {
          "type" : "list",
          "description" : "A comma-separated list of types to restrict the operation"
        }
      },
      "params": {
        "consistency": {
          "type" : "enum",
          "options" : ["one", "quorum", "all"],
          "description" : "Specific write consistency setting for the operation"
        },
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "replication": {
          "type" : "enum",
          "options" : ["sync","async"],
          "default" : "sync",
          "description" : "Specific replication type"
        },
        "routing": {
          "type" : "string",
          "description" : "Specific routing value"
        },
        "source": {
          "type" : "string",
          "description" : "The URL-encoded query definition (instead of using the request body)"
        },
        "timeout": {
          "type" : "time",
          "description" : "Explicit operation timeout"
        }
      }
    },
    "body": {
      "description" : "A query to restrict the operation"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/_query";

        if (isset($index) === true) {
            $uri = "/$index/$type/_query";
        } elseif (isset($type) === true && isset($index) === true) {
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
            'consistency',
            'ignore_indices',
            'replication',
            'routing',
            'source',
            'timeout',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'DELETE';
    }
}