<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Delete
 * @package Elasticsearch\Endpoints
 */
class Delete extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "delete": {
    "documentation": "http://elasticsearch.org/guide/reference/api/delete/",
    "methods": ["DELETE"],
    "url": {
      "path": "/{index}/{type}/{id}",
      "paths": ["/{index}/{type}/{id}"],
      "parts": {
        "id": {
          "type" : "string",
          "required" : true,
          "description" : "The document ID"
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
          "description" : "Specific write consistency setting for the operation"
        },
        "parent": {
          "type" : "string",
          "description" : "ID of parent document"
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
        "routing": {
          "type" : "string",
          "description" : "Specific routing value"
        },
        "timeout": {
          "type" : "time",
          "description" : "Explicit operation timeout"
        },
        "version_type": {
          "type" : "enum",
          "options" : ["internal","external"],
          "description" : "Specific version type"
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

        if (isset($id) !== true) {
            throw new Exceptions\BadMethodCallException(
                'id is required for Delete'
            );
        }

        if (isset($index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Delete'
            );
        }

        if (isset($type) !== true) {
            throw new Exceptions\BadMethodCallException(
                'type is required for Delete'
            );
        }

        $uri   = '/{index}/{type}/{id}';
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
            'parent',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'version_type',
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