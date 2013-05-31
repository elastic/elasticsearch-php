<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices\Gateway;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Snapshot
 * @package Elasticsearch\Endpoints\Indices\Gateway
 */
class Snapshot extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.gateway.snapshot": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-gateway-snapshot/",
    "methods": ["POST"],
    "url": {
      "path": "/_gateway/snapshot",
      "paths": ["/_gateway/snapshot", "/{index}/_gateway/snapshot"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of index names; use `_all` or empty string for all indices"
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

        if (isset($index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Snapshot'
            );
        }

        $uri   = '/_gateway/snapshot';
        $index = $this->index;

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
        return 'POST';
    }
}