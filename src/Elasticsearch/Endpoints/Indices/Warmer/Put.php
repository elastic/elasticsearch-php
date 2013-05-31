<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices\Warmer;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 * @package Elasticsearch\Endpoints\Indices\Warmer
 */
class Put extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.warmer.put": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-warmers/",
    "methods": ["PUT"],
    "url": {
      "path": "/{index}/_warmer/{name}",
      "paths": ["/{index}/_warmer/{name}", "/{index}/{type}/_warmer/{name}"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index names to register the warmer for; use `_all` or empty string to perform the operation on all indices"
        },
        "name": {
          "type" : "string",
          "description" : "The name of the warmer"
        },
        "type": {
          "type" : "list",
          "description" : "A comma-separated list of document types to register the warmer for; leave empty to perform the operation on all types"
        }
      },
      "params": {
      }
    },
    "body": {
      "description" : "The search request definition for the warmer (query, filters, facets, sorting, etc)"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/{index}/_warmer/{name}';
        $index = $this->index;
        $name = $this->name;
        $type = $this->type;

        if (isset($index) === true) {
            $uri = "/$index/$type/_warmer/$name";
        } elseif (isset($name) === true && isset($index) === true) {
            $uri = "";
        }
 elseif (isset($type) === true && isset($name) === true && isset($index) === true) {
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
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'PUT';
    }
}