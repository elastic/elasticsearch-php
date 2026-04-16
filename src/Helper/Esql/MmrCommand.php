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
 * Implementation of the `MMR` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class MmrCommand extends EsqlBase {
    private string $field;
    private mixed $query_vector;
    private ?int $max_number_of_rows = null;
    private ?array $options = null;

    public function __construct(EsqlBase $previous_command, string $field, mixed $query_vector)
    {
        parent::__construct($previous_command);
        $this->field = $field;
        $this->query_vector = $query_vector;
    }

    public function mmr_limit(int $max_number_of_rows): MmrCommand
    {
        $this->max_number_of_rows = $max_number_of_rows;
        return $this;
    }

    public function with(mixed ...$options): MmrCommand
    {
        $this->options = $options;
        return $this;
    }

    protected function renderInternal(): string
    {
        $on = "";
        if ($this->query_vector != null) {
            $on .= $this->formatExpression($this->query_vector) . " ";
        }
        $on .= "ON " . $this->formatId($this->field);
        $limit = "";
        if ($this->max_number_of_rows != null) {
            $limit = " LIMIT " . json_encode($this->max_number_of_rows);
        }
        $with = "";
        if ($this->options != null) {
            $with = " WITH " . $this->esql_json_encode($this->options);
        }
        return "MMR " . $on . $limit . $with;
    }
}
