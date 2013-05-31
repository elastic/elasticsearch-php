<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices\Validate;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Query
 * @package Elasticsearch\Endpoints\Indices\Validate
 */
class Query extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.validate.query": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/validate/",
    "methods": ["GET", "POST"],
    "url": {
      "path": "/_validate/query",
      "paths": ["/_validate/query", "/{index}/_validate/query", "/{index}/{type}/_validate/query"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices"
        },
        "type": {
          "type" : "list",
          "description" : "A comma-separated list of document types to restrict the operation; leave empty to perform the operation on all types"
        }
      },
      "params": {
        "explain": {
          "type" : "boolean",
          "description" : "Return detailed information about the error"
        },
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "operation_threading": {
          "description" : "TODO: ?"
        },
        "source": {
          "type" : "string",
          "description" : "The URL-encoded query definition (instead of using the request body)"
        }
      }
    },
    "body": {
      "description" : "The query definition"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_validate/query';
        $index = $this->index;
        $type = $this->type;

        if (isset($index) === true) {
            $uri = "/$index/_validate/query";
        } elseif (isset($type) === true && isset($index) === true) {
            $uri = "/$index/$type/_validate/query";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'explain',
            'ignore_indices',
            'operation_threading',
            'source',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'GET,POST';
    }
}