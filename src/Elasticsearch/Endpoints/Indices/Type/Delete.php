<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints\Indices\Type;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Delete
 * @package Elasticsearch\Endpoints\Indices\Type
 */
class Delete extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.type.delete": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-delete-mapping/",
    "methods": ["DELETE"],
    "url": {
      "path": "/{index}/{type}/_mapping",
      "paths": ["/{index}/{type}/_mapping", "/{index}/{type}"],
      "parts": {
        "index": {
          "type" : "list",
          "required" : true,
          "description" : "A comma-separated list of index names; use `_all` for all indices"
        },
        "type": {
          "type" : "string",
          "description" : "The name of the document type to delete"
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

        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Delete'
            );
        }

        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/_mapping";
 elseif (isset($type) === true) {
            $uri = "";
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
        return 'DELETE';
    }
}