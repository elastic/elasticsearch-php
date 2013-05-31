<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Bulk
 * @package Elasticsearch\Endpoints
 */
class Bulk extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "bulk": {
    "documentation": "http://elasticsearch.org/guide/reference/api/bulk/",
    "methods": ["POST", "PUT"],
    "url": {
      "path": "/_bulk",
      "paths": ["/_bulk", "/{index}/_bulk", "/{index}/{type}/_bulk"],
      "parts": {
        "index": {
          "type" : "string",
          "description" : "Default index for items which don't provide one"
        },
        "type": {
          "type" : "string",
          "description" : "Default document type for items which don't provide one"
        }
      },
      "params": {
        "consistency": {
          "type" : "enum",
          "options" : ["one", "quorum", "all"],
          "description" : "Explicit write consistency setting for the operation"
        },
        "refresh": {
          "type" : "boolean",
          "description" : "Refresh the index after performing the operation"
        },
        "replication": {
          "type" : "enum",
          "options" : ["sync","async"],
          "default" : "sync",
          "description" : "Explicitely set the replication type"
        },
        "type": {
          "type" : "string",
          "description" : "Default document type for items which don't provide one"
        }
      }
    },
    "body": {
      "description" : "The operation definition and data (action-data pairs), separated by newlines"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_bulk';
        $index = $this->index;
        $type = $this->type;

        if (isset($index) === true) {
            $uri = "/$index/_bulk";
        } elseif (isset($type) === true && isset($index) === true) {
            $uri = "/$index/$type/_bulk";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'consistency',
            'refresh',
            'replication',
            'type',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'POST,PUT';
    }
}