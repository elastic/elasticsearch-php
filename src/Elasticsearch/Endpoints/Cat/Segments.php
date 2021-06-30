<?php

declare(strict_types = 1);
/**
 * User: zach
 * Date: 01/12/2015
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Segments
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class Segments extends AbstractEndpoint
{
   /**
    * @return string
    */
    public function getURI(): string
    {
        $index = $this->index;
        $uri   = "/_cat/segments";

        if (isset($index) === true) {
            $uri = "/_cat/segments/$index";
        }

        return $uri;
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return array(
            'h',
            'help',
            'v',
            's',
            'format',
        );
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'GET';
    }
}
