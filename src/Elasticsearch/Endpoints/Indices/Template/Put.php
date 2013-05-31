<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Indices\Template;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 * @package Elasticsearch\Endpoints\Indices\Template
 */
class Put extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.template.put": {
    "documentation": "",
    "methods": ["PUT", "POST"],
    "url": {
      "path": "/_template/{name}",
      "paths": ["/_template/{name}"],
      "parts": {
        "name": {
          "type" : "string",
          "required" : true,
          "description" : "The name of the template"
        }
      },
      "params": {
        "order": {
          "type" : "number",
          "description" : "The order for this template when merging multiple matching ones (higher numbers are merged later, overriding the lower numbers)"
        },
        "timeout": {
          "type" : "time",
          "description" : "Explicit operation timeout"
        }
      }
    },
    "body": {
      "description" : "The template definition"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        if (isset($name) !== true) {
            throw new Exceptions\BadMethodCallException(
                'name is required for Put'
            );
        }

        $uri   = '/_template/{name}';
        $name = $this->name;

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'order',
            'timeout',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'PUT,POST';
    }
}