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
 * Implementation of the `COMPLETION` processing command.
 *
 * This class inherits from EsqlBase to make it possible to chain all the commands
 * that belong to an ES|QL query in a single expression.
 */
class CompletionCommand extends EsqlBase {
    private string $prompt;
    private array $named_prompt = [];
    private string $inference_id = "";

    public function __construct(EsqlBase $previous_command, array $prompt)
    {
        if (sizeof($prompt) != 1) {
            throw new RuntimeException("Only one prompt is supported");
        }
        parent::__construct($previous_command);
        if ($this->isNamedArgumentList($prompt)) {
            $this->named_prompt = $prompt;
        }
        else {
            $this->prompt = $prompt[0];
        }
    }

    /**
     * Continuation of the `COMPLETION` command.
     *
     * @param string $inference_id The ID of the inference endpoint to use for
     *                             the task. The inference endpoint must be
     *                             configured with the `completion` task type.
     */
    public function with(string $inference_id): CompletionCommand
    {
        $this->inference_id = $inference_id;
        return $this;
    }

    protected function renderInternal(): string
    {
        if (!$this->inference_id) {
            throw new RuntimeException("The completion command requires an inference ID");
        }
        $with = ["inference_id" => $this->inference_id];
        if ($this->named_prompt) {
            return "COMPLETION " .
                $this->formatId(array_keys($this->named_prompt)[0]) . " = " .
                $this->formatId(array_values($this->named_prompt)[0]) .
                " WITH " . json_encode($with);
        }
        else {
            return "COMPLETION " . $this->formatId($this->prompt) .
                " WITH " . json_encode($with);
        }
    }
}
