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
 * Implementation of the `LOOKUP_JOIN` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class LookupJoinCommand extends EsqlBase {
    private string $lookup_index;
    private string $field;

    public function __construct(EsqlBase $previous_command, string $lookup_index)
    {
        parent::__construct($previous_command);
        $this->lookup_index = $lookup_index;
    }

    /**
     * Continuation of the `LOOKUP_JOIN` command.
     *
     * @param string $field The field to join on. This field must exist in both
     *                      your current query results and in the lookup index.
     *                      If the field contains multi-valued entries, those
     *                      entries will not match anything (the added fields
     *                      will contain null for those rows).
     */
    public function on(string $field): LookupJoinCommand
    {
        $this->field = $field;
        return $this;
    }

    protected function renderInternal(): string
    {
        if (!$this->field) {
            throw new RuntimeException ("Joins require a field to join on.");
        }
        return "LOOKUP JOIN " . $this->lookup_index .
            " ON " . $this->formatId($this->field);
    }
}
