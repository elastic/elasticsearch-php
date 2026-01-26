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
 * Implementation of the `FORK` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class ForkCommand extends EsqlBase {
    private array $branches;

    public function __construct(
        EsqlBase $previous_command,
        EsqlBase $fork1,
        ?EsqlBase $fork2 = null,
        ?EsqlBase $fork3 = null,
        ?EsqlBase $fork4 = null,
        ?EsqlBase $fork5 = null,
        ?EsqlBase $fork6 = null,
        ?EsqlBase $fork7 = null,
        ?EsqlBase $fork8 = null
    )
    {
        parent::__construct($previous_command);
        $this->branches = [$fork1, $fork2, $fork3, $fork4, $fork5, $fork6, $fork7, $fork8];
    }

    protected function renderInternal(): string
    {
        $cmds = "";
        foreach ($this->branches as $branch) {
            if ($branch) {
                $cmd = str_replace("\n", " ", substr($branch->render(), 3));
                if ($cmds == "") {
                    $cmds = "( " . $cmd . " )";
                }
                else {
                    $cmds .= "\n       ( " . $cmd . " )";
                }
            }
        }
        return "FORK " . $cmds;
    }
}
