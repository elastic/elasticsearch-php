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

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\BulkHelperException;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Iterator;

class Bulk
{
    /**
     * Bulk Helper
     *
     * @param $client Elasticsearch client
     * @param $defaultIndex The index that the bulk operation applies to
     * @param $actions Iterator that provides actions to include in the bulk requests
     * @param $chunkSize the maximum number of operations in a bulk request (DEFAULT: 500)
     * @param $maxChunkBytes the maximum size of a bulk request (DEFAULT: 10MB)
     * @throws BulkHelperException
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public static function bulk(Client $client, string $index, Iterator $actions, int $chunk_size = 500, int $max_chunk_bytes = 100 * 1024 * 1024): int {
        $totalCount = 0;
        $chunkCount = 0;
        $chunkBytes = 0;
        $body = [];
        foreach ($actions as $action) {
            foreach ($action as $item) {
                $encodedItem = json_encode($item);
                $chunkBytes += strlen($encodedItem) + 1;
                $body[] = $encodedItem;
            }
            if (count($action) > 0) {
                $chunkCount++;
                $totalCount++;
            }
            if (count($action) == 0 || $chunkCount >= $chunk_size || $chunkBytes >= $max_chunk_bytes) {
                $response = $client->bulk(['index' => $index, 'body' => $body]);
                if ($response['errors']) {
                    $error = new BulkHelperException('Bulk upload error');
                    $error->setResponse($response);
                    throw $error;
                }
                $body = [];
                $chunkCount = 0;
                $chunkBytes = 0;
                unset($response);
            }
        }
        if (!empty($body)) {
            $response = $client->bulk(['index' => $index, 'body' => $body]);
            if ($response['errors']) {
                $error = new BulkHelperException('Bulk upload error');
                $error->setResponse($response);
                throw $error;
            }
            unset($body);
            unset($response);
        }
        return $totalCount;
    }

    private static function action(string $action, array $metadata, ?array $document): array {
        if (count($metadata) == 0) {
            $metadata = new class {};
        }
        if (isset($document)) {
            return [
                [$action => $metadata],
                $document,
            ];
        }
        else {
            return [
                [$action => $metadata],
            ];
        }
    }

    /**
     * Return an index action for the bulk helper.
     *
     * @param $document The document to index.
     * @param $id The id of the document. If omitted, a new document id will be assigned.
     * @param $metadata Additional metadata to include.
     * @return array
     */
    public static function indexAction(array $document, ?string $id = null, ?array $other_metadata = null): array {
        $metadata = [];
        if (isset($id)) {
            $metadata['_id'] = $id;
        }
        if (isset($other_metadata)) {
            $metadata = array_merge($other_metadata, $metadata);
        }
        return Bulk::action('index', $metadata, $document);
    }

    /**
     * Return a create action for the bulk helper.
     *
     * @param $document The document to create.
     * @param $id The id of the document. If omitted, a new document id will be assigned.
     * @param $metadata Additional metadata to include.
     * @return array
     */
    public static function createAction(array $document, ?string $id = null, ?array $other_metadata = null): array {
        $metadata = [];
        if (isset($id)) {
            $metadata['_id'] = $id;
        }
        if (isset($other_metadata)) {
            $metadata = array_merge($other_metadata, $metadata);
        }
        return Bulk::action('create', $metadata, $document);
    }

    /**
     * Return an partial update action for the bulk helper.
     *
     * @param $document The document to index.
     * @param $id The id of the document.
     * @param $metadata Additional metadata to include.
     * @return array
     */
    public static function updateAction(array $document, string $id, ?array $other_metadata = null): array {
        $metadata = ['_id' => $id];
        if (isset($other_metadata)) {
            $metadata = array_merge($other_metadata, $metadata);
        }
        return Bulk::action('update', $metadata, ['doc' => $document]);
    }

    /**
     * Return a delete action for the bulk helper.
     *
     * @param $id The id of the document. If omitted, a new document id will be assigned.
     * @param $other_metadata Additional metadata to include.
     * @return array
     */
    public static function deleteAction(string $id, ?array $other_metadata = null): array {
        $metadata = ['_id' => $id];
        if (isset($other_metadata)) {
            $metadata = array_merge($other_metadata, $metadata);
        }
        return Bulk::action('delete', $metadata, null);
    }

    /**
     * Return a flush action for the bulk helper.
     *
     * This isn't a proper action that is sent to the server, but just an indicator
     * for the bulk helper to write all the entries that have been accumulated so
     * far, even if they do not meet the count or size criteria for writing.
     *
     * @return array
     */
    public static function flushAction(): array {
        return [];
    }
}
