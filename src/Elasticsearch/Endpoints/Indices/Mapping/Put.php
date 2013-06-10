<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 * @package Elasticsearch\Endpoints\Indices\Mapping
 */
class Put extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.mapping.put": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-put-mapping/",
    "methods": ["PUT", "POST"],
    "url": {
      "path": "/{index}/_mapping",
      "paths": ["/{index}/_mapping", "/{index}/{type}/_mapping"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of index names; use `_all` to perform the operation on all indices"
        },
        "type": {
          "type" : "string",
          "description" : "The name of the document type"
        }
      },
      "params": {
        "ignore_conflicts": {
          "type" : "boolean",
          "description" : "Specify whether to ignore conflicts while updating the mapping (default: false)"
        },
        "timeout": {
          "type" : "time",
          "description" : "Explicit operation timeout"
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
            throw new Exceptions\RuntimeException(
                'index is required for Put'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Put'
            );
        }

        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/_mapping";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'ignore_conflicts',
            'timeout',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'PUT,POST';
    }
}