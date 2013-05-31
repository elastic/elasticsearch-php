<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
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

        if (isset($index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Delete'
            );
        }

        $uri   = '/{index}/{type}/_mapping';
        $index = $this->index;
        $type = $this->type;
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