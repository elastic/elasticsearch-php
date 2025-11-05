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
 * Implementation of the `DROP` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class DropCommand extends EsqlBase {
    private array $columns;

    public function __construct(EsqlBase $previous_command, array $columns)
    {
        parent::__construct($previous_command);
        $this->columns = $columns;
    }

    protected function renderInternal(): string
    {
        return "DROP " . implode(
            ", ", array_map(array($this, "formatId"), $this->columns)
        );
    }
}
