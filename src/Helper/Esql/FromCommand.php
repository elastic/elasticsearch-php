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

class FromCommand extends EsqlBase {
    const name = "FROM";
    private array $indices;
    private array $metadata_fields = [];

    public function __construct(array $indices)
    {
        $this->indices = $indices;
    }

    /**
     * Continuation of the `FROM` or `TS` source commands.
     *
     * *param string ...$metadata_fields Metadata fields to retrieve, given as
     *                                   positional arguments.
     */
    public function metadata(string ...$metadata_fields): FromCommand
    {
        $this->metadata_fields = $metadata_fields;
        return $this;
    }

    protected function renderInternal(): string
    {
        $s = $this::name . " " . implode(", ", $this->indices);
        if (sizeof($this->metadata_fields)) {
            $s .= " METADATA " . implode(
                ", ", array_map(array($this, "formatId"), $this->metadata_fields)
            );
        }
        return $s;
    }
}
