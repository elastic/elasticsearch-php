<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices\Exists;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Indices
 * @package Elasticsearch\Endpoints\Indices\Exists
 */
class Indices extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.exists.indices": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-indices-exists/",
    "methods": ["HEAD"],
    "url": {
      "path": "/{index}",
      "paths": ["/{index}"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of indices to check"
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
                'index is required for Indices'
            );
        }

        $uri   = '/{index}';
        $index = $this->index;

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
        return 'HEAD';
    }
}