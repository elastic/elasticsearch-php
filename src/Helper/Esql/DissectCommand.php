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
 * Implementation of the `DISSECT` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class DissectCommand extends EsqlBase {
    private string $input;
    private string $pattern;
    private string $separator = "";

    public function __construct(EsqlBase $previous_command, string $input, string $pattern)
    {
        parent::__construct($previous_command);
        $this->input = $input;
        $this->pattern = $pattern;
    }

    /**
     * Continuation of the `DISSECT` command.
     *
     * @param string $separator A string used as the separator between appended
     *                          values, when using the append modifier.
     */
    public function append_separator(string $separator): DissectCommand
    {
        $this->separator = $separator;
        return $this;
    }

    protected function renderInternal(): string
    {
        $sep = $this->separator ? " APPEND_SEPARATOR=" . json_encode($this->separator) : "";
        return "DISSECT " . $this->formatId($this->input) . " " . json_encode($this->pattern) . $sep;
    }
}
