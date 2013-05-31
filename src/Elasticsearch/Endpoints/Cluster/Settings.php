<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
 */

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Settings
 * @package Elasticsearch\Endpoints\Cluster
 */
class Settings extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "cluster.settings": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-cluster-update-settings/",
    "methods": ["GET", "PUT"],
    "url": {
      "path": "/_cluster/settings",
      "paths": ["/_cluster/settings"],
      "parts": {
      },
      "params": {
      }
    },
    "body": {
      "description" : "The settings to be updated. Can be either `transient` or `persistent`."
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_cluster/settings';

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
        //TODO Fix Me!
        return 'GET,PUT';
    }
}