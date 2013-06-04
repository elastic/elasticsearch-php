<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 * @package Elasticsearch\Endpoints
 */
class Get extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "get": {
    "documentation": "http://elasticsearch.org/guide/reference/api/get/",
    "methods": ["GET", "HEAD", "POST"],
    "url": {
      "path": "/{index}/{type}/{id}",
      "paths": ["/{index}/{type}/{id}", "/{index}/{type}/{id}/_source"],
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
          "description" : "The type of the document (use `_all` to fetch the first document matching the ID across all types)"
        }
      },
      "params": {
        "fields": {
          "type": "list",
          "description" : "A comma-separated list of fields to return in the response"
        },
        "parent": {
          "type" : "string",
          "description" : "The ID of the parent document"
        },
        "preference": {
          "type" : "string",
          "description" : "Specify the shards the operation should be performed on (default: random shard)"
        },
        "realtime": {
          "type" : "boolean",
          "description" : "Specify whether to perform the operation in realtime or search mode"
        },
        "refresh": {
          "type" : "boolean",
          "description" : "Refresh the shard containing the document before performing the operation"
        },
        "routing": {
          "type" : "string",
          "description" : "Specific routing value"
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

        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Get'
            );
        }

        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Get'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Get'
            );
        }

        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'fields',
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'GET,HEAD,POST';
    }
}