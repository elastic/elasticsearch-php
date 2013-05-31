<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 * @package Elasticsearch\Endpoints\Indices\Mapping
 */
class Get extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.mapping.get": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-get-mapping/",
    "methods": ["GET"],
    "url": {
      "path": "/_mapping",
      "paths": ["/_mapping", "/{index}/_mapping", "/{index}/{type}/_mapping"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of index names; use `_all` or empty string for all indices"
        },
        "type": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of document types"
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

        if (isset($index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Get'
            );
        }

        if (isset($type) !== true) {
            throw new Exceptions\BadMethodCallException(
                'type is required for Get'
            );
        }

        $uri   = '/_mapping';
        $index = $this->index;
        $type = $this->type;

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