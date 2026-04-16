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
 * Implementation of the `MMR` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class UserAgentCommand extends EsqlBase {
    private array $prefix;
    private array $options = [];

    public function __construct(EsqlBase $previous_command, array $prefix)
    {
        if (!$this->isNamedArgumentList($prefix) || sizeof($prefix) != 1) {
            throw new RuntimeException("Only one named argument must be given");
        }
        parent::__construct($previous_command);
        $this->prefix = $prefix;
    }

    /**
     * Continuation of the `USER_AGENT` command.
     *
     * @param string ...$options Parsing options.
     */
    public function with(mixed ...$options): UserAgentCommand
    {
        $this->options = $options;
        return $this;
    }

    protected function renderInternal(): string
    {
        $key = array_keys($this->prefix)[0];
        $value = array_values($this->prefix)[0];
        $cmd = "USER_AGENT " . $this->formatId($key) . " = " . $value;
        if (sizeof($this->options) > 0) {
            $cmd .= " WITH " . json_encode($this->options); 
        }
        return $cmd;
    }
}
