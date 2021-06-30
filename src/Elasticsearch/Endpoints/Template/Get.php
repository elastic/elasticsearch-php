<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Template;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Template
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
   /**
    * @return string
    * @throws Exceptions\RuntimeException
    */
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Get'
            );
        }
        $templateId = $this->id;
        $uri  = "/_search/template/$templateId";

        return $uri;
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return array();
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'GET';
    }
}
