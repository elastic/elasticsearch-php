<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Settings
 * @package Elasticsearch\Endpoints\Indices
 */
class Settings extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.settings": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-get-settings/",
    "methods": ["GET", "PUT"],
    "url": {
      "path": "/_settings",
      "paths": ["/_settings", "/{index}/_settings"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices"
        }
      },
      "params": {
      }
    },
    "body": {
      "description" : "The index settings to be updated (when using the PUT method)"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $uri   = "/_settings";

        if (isset($index) === true) {
            $uri = "/$index/_settings";
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
        //TODO Fix Me!
        return 'GET,PUT';
    }
}