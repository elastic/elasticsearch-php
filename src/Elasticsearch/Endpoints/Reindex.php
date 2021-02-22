<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

/**
 * Class Reindex
 *
 */
class Reindex extends AbstractEndpoint
{

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'slices',
            'refresh',
            'timeout',
            'consistency',
            'wait_for_completion',
            'requests_per_second',
        );
    }

    /**
     * @return string
     */
    public function getURI()
    {
        return '/_reindex';
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }
}
