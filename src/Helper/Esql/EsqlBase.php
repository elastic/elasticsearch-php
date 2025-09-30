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

abstract class EsqlBase {
    private ?EsqlBase $parent = null;

    protected function format_kv(array $map): string
    {
        return implode(", ", array_map(
            function($k, $v) {
                return $k . "=" . json_encode($v);
            },
            array_keys($map),
            $map,
        ));
    }

    public function render(): string
    {
        $query = "";
        if ($this->parent) {
            $query .= $this->parent->render() . "\n| ";
        }
        $query .= $this->render_internal();
        return $query;
    }

    protected abstract function render_internal(): string;

    public function __construct(EsqlBase $parent)
    {
        $this->parent = $parent;
    }

    public function __toString(): string
    {
        return $this->render() . "\n";
    }

    public function limit(int $maxNumberOfRows): LimitCommand
    {
        return new LimitCommand($this, $maxNumberOfRows);
    }

    public function where(string ...$expressions): WhereCommand
    {
        return new WhereCommand($this, $expressions);
    }
}
