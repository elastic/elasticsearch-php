<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Delete
 * @package Elasticsearch\Endpoints\Indices
 */
class Delete extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.delete": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-delete-index/",
    "methods": ["DELETE"],
    "url": {
      "path": "/",
      "paths": ["/", "/{index}"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of indices to delete; use `_all` or empty string to delete all indices"
        }
      },
      "params": {
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

        $uri   = '/';
        $index = $this->index;

        if (isset($index) === true) {
            $uri = "/$index";
        }
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