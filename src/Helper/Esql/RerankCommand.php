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

use RuntimeException;

/**
 * Implementation of the `RERANK` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class RerankCommand extends EsqlBase {
    private string $query = "";
    private array $named_query = [];
    private array $fields = [];
    private string $inference_id = "";

    public function __construct(EsqlBase $previous_command, array $query)
    {
        if (sizeof($query) != 1) {
            throw new RuntimeException("Only one query is supported");
        }
        parent::__construct($previous_command);
        if ($this->isNamedArgumentList($query)) {
            $this->named_query = $query;
        }
        else {
            $this->query = $query[0];
        }
    }

    /**
     * Continuation of the `RERANK` command.
     *
     * @param string ...$fields One or more fields to use for reranking. These
     *                          fields should contain the text that the
     *                          reranking model will evaluate.
     */
    public function on(string ...$fields): RerankCommand
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * Continuation of the `RERANK` command.
     *
     * @param string $inference_id The ID of the inference endpoint to use for
     *                             the task. The inference endpoint must be
     *                             configured with the `rerank` task type.
     */
    public function with(string $inference_id): RerankCommand
    {
        $this->inference_id = $inference_id;
        return $this;
    }

    protected function renderInternal(): string
    {
        if (sizeof($this->fields) == 0) {
            throw new RuntimeException(
                "The rerank command requires one or more fields to rerank on"
            );
        }
        if ($this->inference_id == "") {
            throw new RuntimeException(
                "The rerank command requires an inference ID"
            );
        }
        $with = ["inference_id" => $this->inference_id];
        if (sizeof($this->named_query)) {
            $column = array_keys($this->named_query)[0];
            $value = array_values($this->named_query)[0];
            $query = $this->formatId($column) . " = " . json_encode($value);
        }
        else {
            $query = json_encode($this->query);
        }
        return "RERANK " . $query .
            " ON " . implode(", ", array_map(array($this, "formatId"), $this->fields)) .
            " WITH " . json_encode($with);
    }
}
