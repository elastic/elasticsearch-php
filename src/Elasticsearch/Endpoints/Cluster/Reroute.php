<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Reroute
 * @package Elasticsearch\Endpoints\Cluster
 */
class Reroute extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "cluster.reroute": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-cluster-reroute/",
    "methods": ["POST"],
    "url": {
      "path": "/_cluster/reroute",
      "paths": ["/_cluster/reroute"],
      "parts": {
      },
      "params": {
        "dry_run": {
          "type" : "boolean",
          "description" : "Simulate the operation only and return the resulting state"
        },
        "filter_metadata": {
          "type" : "boolean",
          "description" : "TODO: ?"
        }
      }
    },
    "body": {
      "description" : "The definition of `commands` to perform (`move`, `cancel`, `allocate`)"
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_cluster/reroute';

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'dry_run',
            'filter_metadata',
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