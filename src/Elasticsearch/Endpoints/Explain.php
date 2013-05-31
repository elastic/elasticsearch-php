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
 * Class Explain
 * @package Elasticsearch\Endpoints
 */
class Explain extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "explain": {
    "documentation": "http://elasticsearch.org/guide/reference/api/explain/",
    "methods": ["GET", "POST"],
    "url": {
      "path": "/{index}/{type}/{id}/_explain",
      "paths": ["/{index}/{type}/{id}/_explain"],
      "parts": {
        "id": {
          "type" : "string",
          "required" : true,
          "description" : "The document ID"
        },
        "index": {
          "type" : "string",
          "required" : true,
          "description" : "The name of the index"
        },
        "type": {
          "type" : "string",
          "required" : true,
          "description" : "The type of the document"
        }
      },
      "params": {
        "analyze_wildcard": {
          "type" : "boolean",
          "description" : "Specify whether wildcards and prefix queries in the query string query should be analyzed (default: false)"
        },
        "analyzer": {
          "type" : "string",
          "description" : "The analyzer for the query string query"
        },
        "default_operator": {
          "type" : "enum",
          "options" : ["AND","OR"],
          "default" : "OR",
          "description" : "The default operator for query string query (AND or OR)"
        },
        "df": {
          "type" : "string",
          "description" : "The default field for query string query (default: _all)"
        },
        "fields": {
          "type": "list",
          "description" : "A comma-separated list of fields to return in the response"
        },
        "lenient": {
          "type" : "boolean",
          "description" : "Specify whether format-based query failures (such as providing text to a numeric field) should be ignored"
        },
        "lowercase_expanded_terms": {
          "type" : "boolean",
          "description" : "Specify whether query terms should be lowercased"
        },
        "parent": {
          "type" : "string",
          "description" : "The ID of the parent document"
        },
        "preference": {
          "type" : "string",
          "description" : "Specify the shards the operation should be performed on (default: random shard)"
        },
        "q": {
          "type" : "string",
          "description" : "Query in the Lucene query string syntax"
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
      "required" : true,
      "description" : "The query definition using the Query DSL"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        if (isset($id) !== true) {
            throw new Exceptions\BadMethodCallException(
                'id is required for Explain'
            );
        }

        if (isset($index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Explain'
            );
        }

        if (isset($type) !== true) {
            throw new Exceptions\BadMethodCallException(
                'type is required for Explain'
            );
        }

        $uri   = '/{index}/{type}/{id}/_explain';
        $id = $this->id;
        $index = $this->index;
        $type = $this->type;

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'analyze_wildcard',
            'analyzer',
            'default_operator',
            'df',
            'fields',
            'lenient',
            'lowercase_expanded_terms',
            'parent',
            'preference',
            'q',
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
        return 'GET,POST';
    }
}