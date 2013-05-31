<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices\Alias;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 * @package Elasticsearch\Endpoints\Indices\Alias
 */
class Get extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.alias.get": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-aliases/",
    "methods": ["GET"],
    "url": {
      "path": "/_alias/{name}",
      "paths": ["/_alias/{name}", "/{index}/_alias/{name}"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index names to filter aliases"
        },
        "name": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of alias names to return"
        }
      },
      "params": {
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index names to filter aliases"
        },
        "name": {
          "type" : "list",
          "description" : "A comma-separated list of alias names to return"
        }
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

        if (isset($name) !== true) {
            throw new Exceptions\BadMethodCallException(
                'name is required for Get'
            );
        }

        $uri   = '/_alias/{name}';
        $index = $this->index;
        $name = $this->name;

        if (isset($index) === true) {
            $uri = "/$index/_alias/$name";
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
            'index',
            'name',
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