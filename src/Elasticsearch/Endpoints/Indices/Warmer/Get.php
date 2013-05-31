<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices\Warmer;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 * @package Elasticsearch\Endpoints\Indices\Warmer
 */
class Get extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.warmer.get": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-warmers/",
    "methods": ["GET"],
    "url": {
      "path": "/{index}/_warmer",
      "paths": ["/{index}/_warmer", "/{index}/_warmer/{name}", "/{index}/{type}/_warmer/{name}"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices"
        },
        "name": {
          "type" : "string",
          "description" : "The name of the warmer (supports wildcards); leave empty to get all warmers"
        },
        "type": {
          "type" : "list",
          "description" : "A comma-separated list of document types to restrict the operation; leave empty to perform the operation on all types"
        }
      },
      "params": {
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

        $index = $this->index;
        $name = $this->name;
        $type = $this->type;
        $uri   = "/$index/_warmer";

        if (isset($index) === true) {
            $uri = "/$index/_warmer/$name";
        } elseif (isset($name) === true && isset($index) === true) {
            $uri = "/$index/$type/_warmer/$name";
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
        return 'GET';
    }
}