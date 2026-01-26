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
 * Implementation of the `CHANGE_POINT` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class ChangePointCommand extends EsqlBase {
    private string $value;
    private string $key = "";
    private string $type_name = "";
    private string $pvalue_name = "";

    public function __construct(EsqlBase $previous_command, string $value)
    {
        parent::__construct($previous_command);
        $this->value = $value;
    }

    /**
     * Continuation of the `CHANGE_POINT` command.
     *
     * @param string $key The column with the key to order the values by. If not
     *                    specified, `@timestamp` is used.
     */
    public function on(string $key): ChangePointCommand
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Continuation of the `CHANGE_POINT` command.
     *
     * @param string $type_name The name of the output column with the change
     *                          point type. If not specified, `type` is used.
     * @param string $pvalue_name The name of the output column with the p-value
     *                            that indicates how extreme the change point is.
     *                            If not specified, `pvalue` is used.
     */
    public function as(string $type_name, string $pvalue_name): ChangePointCommand
    {
        $this->type_name = $type_name;
        $this->pvalue_name = $pvalue_name;
        return $this;
    }

    protected function renderInternal(): string
    {
        $key = $this->key ? " ON " . $this->formatId($this->key) : "";
        $names = ($this->type_name && $this->pvalue_name) ?
            " AS " . $this->formatId($this->type_name) . ", " .
                $this->formatId($this->pvalue_name)
            : "";
        return "CHANGE_POINT " . $this->value . $key . $names;
    }
}
