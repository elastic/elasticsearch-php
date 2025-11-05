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
 * Implementation of the `WHERE` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class WhereCommand extends EsqlBase {
    private array $expressions;

    public function __construct(EsqlBase $previous_command, array $expressions)
    {
        parent::__construct($previous_command);
        $this->expressions = $expressions;
    }

    protected function renderInternal(): string
    {
        return "WHERE " . implode(" AND ", $this->expressions);
    }
}
