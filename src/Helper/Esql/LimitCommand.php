<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Elasticsearch\Helper\Esql;

class LimitCommand extends EsqlBase {
    private int $maxNumberOfRows;

    public function __construct(EsqlBase $parent, int $maxNumberOfRows)
    {
        parent::__construct($parent);
        $this->maxNumberOfRows = $maxNumberOfRows;
    }

    protected function render_internal(): string
    {
        return "LIMIT " . json_encode($this->maxNumberOfRows);
    }
}
