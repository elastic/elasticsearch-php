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

namespace Elastic\Elasticsearch\Helper\Iterators;

use Elastic\Elasticsearch\ClientInterface;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Iterator;

class SearchResponseIterator implements Iterator
{

    /**
     * @var ClientInterface
     */
    private ClientInterface $client;

    /**
     * @var array
     */
    private array $params;

    /**
     * @var int
     */
    private int $currentKey = 0;

    /**
     * @var array
     */
    private array $currentScrolledResponse;

    /**
     * @var string|null
     */
    private ?string $scrollId;

    /**
     * @var string duration
     */
    private $scrollTtl;

    /**
     * Constructor
     *
     * @param ClientInterface $client
     * @param array  $searchParams Associative array of parameters
     * @see   ClientInterface::search()
     */
    public function __construct(ClientInterface $client, array $searchParams)
    {
        $this->client = $client;
        $this->params = $searchParams;

        if (isset($searchParams['scroll'])) {
            $this->scrollTtl = $searchParams['scroll'];
        }
    }

    /**
     * Destructor
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public function __destruct()
    {
        $this->clearScroll();
    }

    /**
     * Sets the time to live duration of a scroll window
     *
     * @param  string $timeToLive
     * @return $this
     */
    public function setScrollTimeout(string $timeToLive): SearchResponseIterator
    {
        $this->scrollTtl = $timeToLive;
        return $this;
    }

    /**
     * Clears the current scroll window if there is a scroll_id stored
     *
     * @return void
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    private function clearScroll(): void
    {
        if (!empty($this->scrollId)) {
            /* @phpstan-ignore-next-line */
            $this->client->clearScroll(
                [
                    'body' => [
                        'scroll_id' => $this->scrollId
                    ],
                    'client' => [
                        'ignore' => 404
                    ]
                ]
            );
            $this->scrollId = null;
        }
    }

    /**
     * Rewinds the iterator by performing the initial search.
     *
     * @return void
     * @throws ClientResponseException
     * @throws ServerResponseException
     * @see    Iterator::rewind()
     */
    public function rewind(): void
    {
        $this->clearScroll();
        $this->currentKey = 0;
        /* @phpstan-ignore-next-line */
        $this->currentScrolledResponse = $this->client->search($this->params)->asArray();
        $this->scrollId = $this->currentScrolledResponse['_scroll_id'];
    }

    /**
     * Fetches every "page" after the first one using the lastest "scroll_id"
     *
     * @return void
     * @throws ClientResponseException
     * @throws ServerResponseException
     * @see    Iterator::next()
     */
    public function next(): void
    {
        /* @phpstan-ignore-next-line */
        $this->currentScrolledResponse = $this->client->scroll(
            [
                'body' => [
                    'scroll_id' => $this->scrollId,
                    'scroll'    => $this->scrollTtl
                ]
            ]
        )->asArray();
        $this->scrollId = $this->currentScrolledResponse['_scroll_id'];
        $this->currentKey++;
    }

    /**
     * Returns a boolean value indicating if the current page is valid or not
     *
     * @return bool
     * @see    Iterator::valid()
     */
    public function valid(): bool
    {
        return isset($this->currentScrolledResponse['hits']['hits'][0]);
    }

    /**
     * Returns the current "page"
     *
     * @return array
     * @see    Iterator::current()
     */
    public function current(): array
    {
        return $this->currentScrolledResponse;
    }

    /**
     * Returns the current "page number" of the current "page"
     *
     * @return int
     * @see    Iterator::key()
     */
    public function key(): int
    {
        return $this->currentKey;
    }
}