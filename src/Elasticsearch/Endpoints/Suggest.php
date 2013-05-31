<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Suggest
 * @package Elasticsearch\Endpoints
 */
class Suggest extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "suggest": {
    "documentation": "http://elasticsearch.org/guide/reference/api/search/suggest/",
    "methods": ["POST", "GET"],
    "url": {
      "path": "/_suggest",
      "paths": ["/_suggest", "/{index}/_suggest"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices"
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
        "preference": {
          "type" : "string",
          "description" : "Specify the shards the operation should be performed on (default: random shard)"
        },
        "routing": {
          "type" : "string",
          "description" : "Specific routing value"
        },
        "source": {
          "type" : "string",
          "description" : "The URL-encoded request definition (instead of using request body)"
        }
      }
    },
    "body": {
      "description" : "The request definition"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_suggest';
        $index = $this->index;

        if (isset($index) === true) {
            $uri = "/$index/_suggest";
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
            'preference',
            'routing',
            'source',
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