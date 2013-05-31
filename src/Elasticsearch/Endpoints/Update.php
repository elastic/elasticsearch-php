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
 * Class Update
 * @package Elasticsearch\Endpoints
 */
class Update extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "update": {
    "documentation": "http://elasticsearch.org/guide/reference/api/update/",
    "methods": ["POST"],
    "url": {
      "path": "/{index}/{type}/{id}/_update",
      "paths": ["/{index}/{type}/{id}/_update"],
      "parts": {
        "id": {
          "type" : "string",
          "required" : true,
          "description" : "Document ID"
        },
        "index": {
          "type" : "string",
          "required" : true,
          "description" : "The name of the index"
        },
        "type": {
          "type" : "string",
          "required" : true,
          "description" : "The type of the document"
        }
      },
      "params": {
        "consistency": {
          "type" : "enum",
          "options" : ["one", "quorum", "all"],
          "description" : "Explicit write consistency setting for the operation"
        },
        "fields": {
          "type": "list",
          "description" : "A comma-separated list of fields to return in the response"
        },
        "lang": {
          "type" : "string",
          "description" : "The script language (default: mvel)"
        },
        "parent": {
          "type" : "string",
          "description" : "ID of the parent document"
        },
        "percolate": {
          "type" : "string",
          "description" : "Perform percolation during the operation; use specific registered query name, attribute, or wildcard"
        },
        "refresh": {
          "type" : "boolean",
          "description" : "Refresh the index after performing the operation"
        },
        "replication": {
          "type" : "enum",
          "options" : ["sync","async"],
          "default" : "sync",
          "description" : "Specific replication type"
        },
        "retry_on_conflict": {
          "type" : "number",
          "description" : "Specify how many times should the operation be retried when a conflict occurs (default: 0)"
        },
        "routing": {
          "type" : "string",
          "description" : "Specific routing value"
        },
        "script": {
          "description" : "The URL-encoded script definition (instead of using request body)"
        },
        "timeout": {
          "type" : "time",
          "description" : "Explicit operation timeout"
        },
        "timestamp": {
          "type" : "time",
          "description" : "Explicit timestamp for the document"
        },
        "ttl": {
          "type" : "duration",
          "description" : "Expiration time for the document"
        },
        "version_type": {
          "type" : "number",
          "description" : "Explicit version number for concurrency control"
        }
      }
    },
    "body": {
      "description" : "The request definition using either `script` or partial `doc`"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        if (isset($id) !== true) {
            throw new Exceptions\BadMethodCallException(
                'id is required for Update'
            );
        }

        if (isset($index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Update'
            );
        }

        if (isset($type) !== true) {
            throw new Exceptions\BadMethodCallException(
                'type is required for Update'
            );
        }

        $uri   = '/{index}/{type}/{id}/_update';
        $id = $this->id;
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
            'consistency',
            'fields',
            'lang',
            'parent',
            'percolate',
            'refresh',
            'replication',
            'retry_on_conflict',
            'routing',
            'script',
            'timeout',
            'timestamp',
            'ttl',
            'version_type',
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