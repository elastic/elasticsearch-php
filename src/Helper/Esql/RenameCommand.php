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
 * Implementation of the `RENAME` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class RenameCommand extends EsqlBase {
    private array $named_columns;

    public function __construct(EsqlBase $previous_command, array $columns)
    {
        if (!$this->isNamedArgumentList($columns)) {
            throw new RuntimeException("Only named arguments are valid");
        }
        parent::__construct($previous_command);
        $this->named_columns = $columns;
    }

    protected function renderInternal(): string
    {
        return "RENAME " . $this->formatKeyValues($this->named_columns, joinText: "AS");
    }
}
