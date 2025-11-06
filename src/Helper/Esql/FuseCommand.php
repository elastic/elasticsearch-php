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
 * Implementation of the `FUSE` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class FuseCommand extends EsqlBase {
    private string $method;
    private array $columns = [];
    private array $options = [];

    public function __construct(EsqlBase $previous_command, string $method)
    {
        parent::__construct($previous_command);
        $this->method = $method;
    }

    public function by(string ...$columns): FuseCommand
    {
        $this->columns = $columns;
        return $this;
    }

    public function with(mixed ...$options): FuseCommand
    {
        $this->options = $options;
        return $this;
    }

    protected function renderInternal(): string
    {
        $method = ($this->method != "") ? " " . strtoupper($this->method) : "";
        $by = sizeof($this->columns) ? " " . implode(" ", array_map(function($column) {
            return "BY " . $column;
        }, $this->columns)) : "";
        $with = sizeof($this->options) ? " WITH " . json_encode($this->options) : "";
        return "FUSE" . $method . $by . $with;
    }

}
