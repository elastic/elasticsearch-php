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
 * Class Analyze
 * @package Elasticsearch\Endpoints\Indices
 */
class Analyze extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.analyze": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-analyze/",
    "methods": ["GET", "POST"],
    "url": {
      "path": "/_analyze",
      "paths": ["/_analyze", "/{index}/_analyze"],
      "parts": {
        "index": {
          "type" : "string",
          "description" : "The name of the index to scope the operation"
        }
      },
      "params": {
        "analyzer": {
          "type" : "string",
          "description" : "The name of the analyzer to use"
        },
        "field": {
          "type" : "string",
          "description" : "The name of the field to "
        },
        "filters": {
          "type" : "list",
          "description" : "A comma-separated list of filters to use for the analysis"
        },
        "index": {
          "type" : "string",
          "description" : "The name of the index to scope the operation"
        },
        "prefer_local": {
          "type" : "boolean",
          "description" : "With `true`, specify that a local shard should be used if available, with `false`, use a random shard (default: true)"
        },
        "text": {
          "type" : "string",
          "description" : "The text on which the analysis should be performed (when request body is not used)"
        },
        "tokenizer": {
          "type" : "string",
          "description" : "The name of the tokenizer to use for the analysis"
        }
      }
    },
    "body": {
      "description" : "The text on which the analysis should be performed"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_analyze';
        $index = $this->index;

        if (isset($index) === true) {
            $uri = "/$index/_analyze";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'analyzer',
            'field',
            'filters',
            'index',
            'prefer_local',
            'text',
            'tokenizer',
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