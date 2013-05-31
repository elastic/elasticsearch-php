<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
 */

namespace Elasticsearch\Endpoints\Indices\Template;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 * @package Elasticsearch\Endpoints\Indices\Template
 */
class Get extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.template.get": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-indices-templates/",
    "methods": ["GET"],
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

        if (isset($name) !== true) {
            throw new Exceptions\BadMethodCallException(
                'name is required for Get'
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
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}