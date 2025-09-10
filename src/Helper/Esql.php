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

namespace Elastic\Elasticsearch\Helper;

abstract class ESQL {
    public static function from(string ...$indices): From
    {
        return new From($indices);
    }
}

abstract class ESQLBase {
    private ?ESQLBase $parent = null;

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

    public function __construct(ESQLBase $parent)
    {
        $this->parent = $parent;
    }

    public function __toString(): string
    {
        return $this->render();
    }

   public function where(string ...$expressions): Where
    {
        return new Where($this, $expressions);
    }
}

class From extends ESQLBase {
    private array $indices;

    public function __construct(array $indices)
    {
        $this->indices = $indices;
    }

    protected function render_internal(): string
    {
        return "FROM " . implode(", ", $this->indices);
    }
}

class Where extends ESQLBase {
    private array $expressions;

    public function __construct(ESQLBase $parent, array $expressions)
    {
        parent::__construct($parent);
        $this->expressions = $expressions;
    }

    protected function render_internal(): string
    {
        return "WHERE " . implode(" AND ", $this->expressions);
    }
}
