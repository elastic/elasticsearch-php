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
 * Implementation of the `STATS` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class StatsCommand extends EsqlBase {
    private array $expressions;
    private array $named_expressions;
    private array $grouping_expressions;

    public function __construct(EsqlBase $parent, array $expressions)
    {
        parent::__construct($parent);
        if ($this->is_named_argument_list($expressions)) {
            $this->named_expressions = $expressions;
        }
        else {
            $this->expressions = $expressions;
        }
    }

    /**
     * Continuation of the `STATS` command.
     *
     * @param string ...$grouping_expressions Expressions that output the values
     *                                        to group by. If their names
     *                                        coincides with one of the computed
     *                                        columns, that column will be
     *                                        ignored.
     */
    public function by(string ...$grouping_expressions): StatsCommand
    {
        $this->grouping_expressions = $grouping_expressions;
        return $this;
    }

    protected function render_internal(): string
    {
        if ($this->named_expressions) {
            $items = array_map(
                function(string $key): string {
                    return $this->format_id($key) . " = " .
                        $this->format_id($this->named_expressions[$key]);
                },
                array_keys($this->named_expressions)
            );
        }
        else {
            $items = array_map(fn($value): string => $this->format_id($value), $this->expressions);
        }
        $by = "";
        if ($this->grouping_expressions) {
            $by = "\n        BY " . implode(", ", $this->grouping_expressions);
        }
        return "STATS " . implode(",\n        ", $items) . $by;
    }
}
