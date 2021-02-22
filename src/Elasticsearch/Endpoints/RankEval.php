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
 * Class RankEval
 *
 */
class RankEval extends AbstractEndpoint
{
    /**
     * @return array
     */
    public function getParamWhitelist()
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
        ];
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index ?? null;
        if (isset($index)) {
            return "/$index/_rank_eval";
        }
        return '/_rank_eval';
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
