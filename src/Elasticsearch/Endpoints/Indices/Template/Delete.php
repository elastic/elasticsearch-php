<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Template;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Template
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class Delete extends AbstractEndpoint
{
    /**
     * The name of the template
     *
     * @var string
     */
    private $name;

    public function setName(?string $name): Delete
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for Delete'
            );
        }
        return "/_template/{$this->name}";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist(): array
    {
        return [
            'timeout',
            'master_timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
}
