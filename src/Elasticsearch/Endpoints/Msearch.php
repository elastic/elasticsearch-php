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
 * Class Msearch
 * @package Elasticsearch\Endpoints
 */
class Msearch extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "msearch": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/multi-search/",
    "methods": ["GET", "POST"],
    "url": {
      "path": "/_msearch",
      "paths": ["/_msearch", "/{index}/_msearch", "/{index}/{type}/_msearch"],
      "parts": {
        "index": {
         "type" : "list",
         "description" : "A comma-separated list of index names to use as default"
        },
        "type": {
          "type" : "list",
          "description" : "A comma-separated list of document types to use as default"
        }
      },
      "params": {
        "search_type": {
          "type" : "enum",
          "options" : ["query_then_fetch", "query_and_fetch", "dfs_query_then_fetch", "dfs_query_and_fetch", "count", "scan"],
          "description" : "Search operation type"
        }
      }
    },
    "body": {
      "description": "The request definitions (metadata-search request definition pairs), separated by newlines"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_msearch';
        $index = $this->index;
        $type = $this->type;

        if (isset($index) === true) {
            $uri = "/$index/_msearch";
        } elseif (isset($type) === true && isset($index) === true) {
            $uri = "/$index/$type/_msearch";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'search_type',
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