<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices\Alias;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Delete
 * @package Elasticsearch\Endpoints\Indices\Alias
 */
class Delete extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.alias.delete": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-aliases/",
    "methods": ["DELETE"],
    "url": {
      "path": "/{index}/_alias/{name}",
      "paths": ["/{index}/_alias/{name}"],
      "parts": {
        "index": {
          "type" : "string",
          "required" : true,
          "description" : "The name of the index with an alias"
        },
        "name": {
          "type" : "string",
          "required" : true,
          "description" : "The name of the alias to be deleted"
        }
      },
      "params": {
        "timeout": {
          "type" : "time",
          "description" : "Explicit timestamp for the document"
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

        if (isset($this->index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Delete'
            );
        }

        if (isset($this->name) !== true) {
            throw new Exceptions\BadMethodCallException(
                'name is required for Delete'
            );
        }

        $index = $this->index;
        $name = $this->name;
        $uri   = "/$index/_alias/$name";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'timeout',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'DELETE';
    }
}