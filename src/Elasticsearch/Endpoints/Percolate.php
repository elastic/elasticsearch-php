<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Percolate
 * @package Elasticsearch\Endpoints
 */
class Percolate extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "percolate": {
    "documentation": "http://elasticsearch.org/guide/reference/api/percolate/",
    "methods": ["GET", "POST"],
    "url": {
      "path": "/{index}/{type}/_percolate",
      "paths": ["/{index}/{type}/_percolate"],
      "parts": {
        "index": {
          "type" : "string",
          "required" : true,
          "description" : "The name of the index with a registered percolator query"
        },
        "type": {
          "type" : "string",
          "required" : true,
          "description" : "The document type"
        }
      },
      "params": {
        "prefer_local": {
          "type" : "boolean",
          "description" : "With `true`, specify that a local shard should be used if available, with `false`, use a random shard (default: true)"
        }
      }
    },
    "body": {
      "description" : "The document (`doc`) to percolate against registered queries; optionally also a `query` to limit the percolation to specific registered queries"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Percolate'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Percolate'
            );
        }

        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/_percolate";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'prefer_local',
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