<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Count
 * @package Elasticsearch\Endpoints
 */
class Count extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "count": {
    "documentation": "http://elasticsearch.org/guide/reference/api/count/",
    "methods": ["POST", "GET"],
    "url": {
      "path": "/_count",
      "paths": ["/_count", "/{index}/_count", "/{index}/{type}/_count"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of indices to restrict the results"
        },
        "type": {
          "type" : "list",
          "description" : "A comma-separated list of types to restrict the results"
        }
      },
      "params": {
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "min_score": {
          "type" : "number",
          "description" : "Include only documents with a specific `_score` value in the result"
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
          "description" : "The URL-encoded query definition (instead of using the request body)"
        }
      }
    },
    "body": {
      "description" : "A query to restrict the results (optional)"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_count';
        $index = $this->index;
        $type = $this->type;

        if (isset($index) === true) {
            $uri = "/$index/_count";
        } elseif (isset($type) === true && isset($index) === true) {
            $uri = "/$index/$type/_count";
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
            'min_score',
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