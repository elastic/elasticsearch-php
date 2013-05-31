<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Index
 * @package Elasticsearch\Endpoints
 */
class Index extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "index": {
    "documentation": "http://elasticsearch.org/guide/reference/api/index_/",
    "methods": ["POST", "PUT"],
    "url": {
      "path": "/{index}/{type}",
      "paths": ["/{index}/{type}", "/{index}/{type}/{id}", "/{index}/{type}/{id}/_create"],
      "parts": {
        "id": {
          "type" : "string",
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
        "id": {
          "type" : "string",
          "description" : "Specific document ID (when the POST method is used)"
        },
        "op_type": {
          "type" : "enum",
          "options" : ["index", "create"],
          "default" : "index",
          "description" : "Explicit operation type"
        },
        "parent": {
          "type" : "string",
          "description" : "ID of the parent document"
        },
        "percolate": {
          "type" : "string",
          "description" : "Percolator queries to execute while indexing the document"
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
        "timestamp": {
          "type" : "time",
          "description" : "Explicit timestamp for the document"
        },
        "ttl": {
          "type" : "duration",
          "description" : "Expiration time for the document"
        },
        "version" : {
          "type" : "number",
          "description" : "Explicit version number for concurrency control"
        },
        "version_type": {
          "type" : "enum",
          "options" : ["internal","external"],
          "description" : "Specific version type"
        }
      }
    },
    "body": {
      "description" : "The document",
      "required" : true
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        if (isset($this->index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Index'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\BadMethodCallException(
                'type is required for Index'
            );
        }

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type;
        $uri   = "/$index/$type";

        if (isset($id) === true) {
            $uri = "/$index/$type/$id";
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
            'id',
            'op_type',
            'parent',
            'percolate',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'timestamp',
            'ttl',
            'version',
            'version_type',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        if (isset($id) === true) {
            return 'PUT';
        } else {
            return 'POST';
        }
    }
}