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
 * Class Mlt
 * @package Elasticsearch\Endpoints
 */
class Mlt extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "mlt": {
    "documentation": "http://elasticsearch.org/guide/reference/api/more-like-this/",
    "methods": ["GET", "POST"],
    "url": {
      "path": "/{index}/{type}/{id}/_mlt",
      "paths": ["/{index}/{type}/{id}/_mlt"],
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
        "boost_terms": {
          "type" : "number",
          "description" : "The boost factor"
        },
        "max_doc_freq": {
          "type" : "number",
          "description" : "The word occurrence frequency as count: words with higher occurrence in the corpus will be ignored"
        },
        "max_query_terms": {
          "type" : "number",
          "description" : "The maximum query terms to be included in the generated query"
        },
        "max_word_len": {
          "type" : "number",
          "description" : "The minimum length of the word: longer words will be ignored"
        },
        "min_doc_freq": {
          "type" : "number",
          "description" : "The word occurrence frequency as count: words with lower occurrence in the corpus will be ignored"
        },
        "min_term_freq": {
          "type" : "number",
          "description" : "The term frequency as percent: terms with lower occurence in the source document will be ignored"
        },
        "min_word_len": {
          "type" : "number",
          "description" : "The minimum length of the word: shorter words will be ignored"
        },
        "mlt_fields": {
          "type" : "list",
          "description" : "Specific fields to perform the query against"
        },
        "percent_terms_to_match": {
          "type" : "number",
          "description" : "How many terms have to match in order to consider the document a match (default: 0.3)"
        },
        "routing": {
          "type" : "string",
          "description" : "Specific routing value"
        },
        "search_from": {
          "type" : "number",
          "description" : "The offset from which to return results"
        },
        "search_indices": {
          "type" : "list",
          "description" : "A comma-separated list of indices to perform the query against (default: the index containing the document)"
        },
        "search_query_hint": {
          "type" : "string",
          "description" : "The search query hint"
        },
        "search_scroll": {
          "type" : "string",
          "description" : "A scroll search request definition"
        },
        "search_size": {
          "type" : "number",
          "description" : "The number of documents to return (default: 10)"
        },
        "search_source": {
          "type" : "string",
          "description" : "A specific search request definition (instead of using the request body)"
        },
        "search_type": {
          "type" : "string",
          "description" : "Specific search type (eg. `dfs_then_fetch`, `count`, etc)"
        },
        "search_types": {
          "type" : "list",
          "description" : "A comma-separated list of types to perform the query against (default: the same type as the document)"
        },
        "stop_words": {
          "type" : "list",
          "description" : "A list of stop words to be ignored"
        }
      }
    },
    "body": {
      "description" : "A specific search request definition"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        if (isset($this->id) !== true) {
            throw new Exceptions\BadMethodCallException(
                'id is required for Mlt'
            );
        }

        if (isset($this->index) !== true) {
            throw new Exceptions\BadMethodCallException(
                'index is required for Mlt'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\BadMethodCallException(
                'type is required for Mlt'
            );
        }

        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id/_mlt";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'boost_terms',
            'max_doc_freq',
            'max_query_terms',
            'max_word_len',
            'min_doc_freq',
            'min_term_freq',
            'min_word_len',
            'mlt_fields',
            'percent_terms_to_match',
            'routing',
            'search_from',
            'search_indices',
            'search_query_hint',
            'search_scroll',
            'search_size',
            'search_source',
            'search_type',
            'search_types',
            'stop_words',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'GET,POST';
    }
}