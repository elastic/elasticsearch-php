<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices\Cache;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Clear
 * @package Elasticsearch\Endpoints\Indices\Cache
 */
class Clear extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.cache.clear": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-clearcache/",
    "methods": ["POST", "GET"],
    "url": {
      "path": "/_cache/clear",
      "paths": ["/_cache/clear", "/{index}/_cache/clear"],
      "parts": {
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index name to limit the operation"
        }
      },
      "params": {
        "field_data": {
          "type" : "boolean",
          "description" : "Clear field data"
        },
        "fielddata": {
          "type" : "boolean",
          "description" : "Clear field data"
        },
        "fields": {
          "type" : "list",
          "description" : "A comma-separated list of fields to clear when using the `field_data` parameter (default: all)"
        },
        "filter": {
          "type" : "boolean",
          "description" : "Clear filter caches"
        },
        "filter_cache": {
          "type" : "boolean",
          "description" : "Clear filter caches"
        },
        "filter_keys": {
          "type" : "boolean",
          "description" : "A comma-separated list of keys to clear when using the `filter_cache` parameter (default: all)"
        },
        "id": {
          "type" : "boolean",
          "description" : "Clear ID caches for parent/child"
        },
        "id_cache": {
          "type" : "boolean",
          "description" : "Clear ID caches for parent/child"
        },
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index name to limit the operation"
        },
        "recycler": {
          "type" : "boolean",
          "description" : "Clear the recycler cache"
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

        $index = $this->index;
        $uri   = "/_cache/clear";

        if (isset($index) === true) {
            $uri = "/$index/_cache/clear";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'field_data',
            'fielddata',
            'fields',
            'filter',
            'filter_cache',
            'filter_keys',
            'id',
            'id_cache',
            'ignore_indices',
            'index',
            'recycler',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'POST,GET';
    }
}