<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ingest\Pipeline;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ProcessorGrok
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ingest
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ProcessorGrok extends AbstractEndpoint
{
   /**
    * @return string
    * @throws Exceptions\RuntimeException
    */
    public function getURI(): string
    {
        return "/_ingest/processor/grok";
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return [];
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'GET';
    }
}
