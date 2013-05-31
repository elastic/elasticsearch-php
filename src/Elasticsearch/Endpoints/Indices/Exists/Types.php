<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices\Exists;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Types
 * @package Elasticsearch\Endpoints\Indices\Exists
 */
class Types extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.exists.types": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-types-exists/",
    "methods": ["HEAD"],
    "url": {
      "path": "/{index}/{type}",
      "paths": ["/{index}/{type}"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of index names; use `_all` to check the types across all indices"
        },
        "type": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of document types to check"
        }
      },
      "params": {
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
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
                'index is required for Types'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\BadMethodCallException(
                'type is required for Types'
            );
        }

        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'ignore_indices',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'HEAD';
    }
}