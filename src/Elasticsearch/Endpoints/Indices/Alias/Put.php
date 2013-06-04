<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints\Indices\Alias;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 * @package Elasticsearch\Endpoints\Indices\Alias
 */
class Put extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.alias.put": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-aliases/",
    "methods": ["PUT"],
    "url": {
      "path": "/{index}/_alias/{name}",
      "paths": ["/{index}/_alias/{name}", "/_alias/{name}", "/{index}/_alias", "/_alias"],
      "parts": {
        "index": {
          "type" : "string",
          "required" : true,
          "description" : "The name of the index with an alias"
        },
        "name": {
          "type" : "string",
          "required" : true,
          "description" : "The name of the alias to be created or updated"
        }
      },
      "params": {
        "timeout": {
          "type" : "time",
          "description" : "Explicit timestamp for the document"
        }
      }
    },
    "body": {
      "description" : "The settings for the alias, such as `routing` or `filter`"
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
                'index is required for Put'
            );
        }

        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for Put'
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
        return 'PUT';
    }
}