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

/**
 * Implementation of the `LIMIT` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class LimitCommand extends EsqlBase {
    private int $max_number_of_rows;

    public function __construct(EsqlBase $previous_command, int $max_number_of_rows)
    {
        parent::__construct($previous_command);
        $this->max_number_of_rows = $max_number_of_rows;
    }

    protected function renderInternal(): string
    {
        return "LIMIT " . json_encode($this->max_number_of_rows);
    }
}
