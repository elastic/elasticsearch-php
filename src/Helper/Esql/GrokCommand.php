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
 * Implementation of the `GROK` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class GrokCommand extends EsqlBase {
    private string $input;
    private string $pattern;

    public function __construct(EsqlBase $previous_command, string $input, string $pattern)
    {
        parent::__construct($previous_command);
        $this->input = $input;
        $this->pattern = $pattern;
    }

    protected function renderInternal(): string
    {
        return "GROK " . $this->formatId($this->input) . " " . json_encode($this->pattern);
    }
}
