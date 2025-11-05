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
 * Implementation of the `ENRICH` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class EnrichCommand extends EsqlBase {
    private string $policy;
    private string $match_field = "";
    private array $fields = [];
    private array $named_fields = [];

    public function __construct(EsqlBase $previous_command, string $policy)
    {
        parent::__construct($previous_command);
        $this->policy = $policy;
    }

    /**
     * Continuation of the `ENRICH` command.
     *
     * @param string $match_field The match field. `ENRICH` uses its value to
     *                            look for records in the enrich index. If not
     *                            specified, the match will be performed on the
     *                            column with the same name as the `match_field`
     *                            defined in the enrich policy.
     */
    public function on(string $match_field): EnrichCommand
    {
        $this->match_field = $match_field;
        return $this;
    }

    /**
     * Continuation of the `ENRICH` command.
     *
     * @param string ...$fields The enrich fields from the enrich index that
     *                          are added to the result as new columns, given
     *                          as positional or named arguments. If a column
     *                          with the same name as the enrich field already
     *                          exists, the existing column will be replaced by
     *                          the new column. If not specified, each of the
     *                          enrich fields defined in the policy is added. A
     *                          column with the same name as the enrich field
     *                          will be dropped unless the enrich field is
     *                          renamed.
     */
    public function with(string ...$fields): EnrichCommand
    {
        if ($this->isNamedArgumentList($fields)) {
            $this->named_fields = $fields;
        }
        else {
            $this->fields = $fields;
        }
        return $this;
    }

    protected function renderInternal(): string
    {
        $on = ($this->match_field != "") ? " ON " . $this->formatId($this->match_field) : "";
        $with = "";
        $items = [];
        if (sizeof($this->named_fields)) {
            $with = " WITH " . $this->formatKeyValues($this->named_fields);
        }
        else if (sizeof($this->fields)) {
            $with = implode(
                ", ",
                array_map(fn($value): string => $this->formatId($value), $this->fields)
            );
        }
        return "ENRICH " . $this->policy . $on . $with;
    }
}
