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

use Countable;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Iterator;

class SearchHitIterator implements Iterator, Countable
{

    /**
     * @var SearchResponseIterator
     */
    private SearchResponseIterator $searchResponses;

    /**
     * @var int
     */
    protected int $currentKey;

    /**
     * @var int
     */
    protected int $currentHitIndex;

    /**
     * @var array|null
     */
    protected ?array $currentHitData;

    /**
     * @var int
     */
    protected int $count = 0;

    /**
     * Constructor
     *
     * @param SearchResponseIterator $searchResponses
     */
    public function __construct(SearchResponseIterator $searchResponses)
    {
        $this->searchResponses = $searchResponses;
    }

    /**
     * Rewinds the internal SearchResponseIterator and itself
     *
     * @return void
     * @throws ClientResponseException
     * @throws ServerResponseException
     * @see    Iterator::rewind()
     */
    public function rewind(): void
    {
        $this->currentKey = 0;
        $this->searchResponses->rewind();

        // The first page may be empty. In that case, the next page is fetched.
        $currentPage = $this->searchResponses->current();
        if ($this->searchResponses->valid() && empty($currentPage['hits']['hits'])) {
            $this->searchResponses->next();
        }

        $this->count = 0;
        if (isset($currentPage['hits']['total']['value'], $currentPage['hits']['total'])) {
            $this->count = $currentPage['hits']['total']['value'] ?? $currentPage['hits']['total'];
        }

        $this->readPageData();
    }

    /**
     * Advances pointer of the current hit to the next one in the current page. If there
     * isn't a next hit in the current page, then it advances the current page and moves the
     * pointer to the first hit in the page.
     *
     * @return void
     * @throws ClientResponseException
     * @throws ServerResponseException
     * @see    Iterator::next()
     */
    public function next(): void
    {
        $this->currentKey++;
        $this->currentHitIndex++;
        $currentPage = $this->searchResponses->current();
        if (isset($currentPage['hits']['hits'][$this->currentHitIndex])) {
            $this->currentHitData = $currentPage['hits']['hits'][$this->currentHitIndex];
        } else {
            $this->searchResponses->next();
            $this->readPageData();
        }
    }

    /**
     * Returns a boolean indicating whether or not the current pointer has valid data
     *
     * @return bool
     * @see    Iterator::valid()
     */
    public function valid(): bool
    {
        return is_array($this->currentHitData);
    }

    /**
     * Returns the current hit
     *
     * @return array
     * @see    Iterator::current()
     */
    public function current(): array
    {
        return $this->currentHitData;
    }

    /**
     * Returns the current hit index. The hit index spans all pages.
     *
     * @return int
     * @see    Iterator::key()
     */
    public function key(): int
    {
        return $this->currentKey;
    }

    /**
     * Advances the internal SearchResponseIterator and resets the currentHitIndex to 0
     *
     * @internal
     */
    private function readPageData(): void
    {
        if ($this->searchResponses->valid()) {
            $currentPage = $this->searchResponses->current();
            $this->currentHitIndex = 0;
            $this->currentHitData = $currentPage['hits']['hits'][$this->currentHitIndex];
        } else {
            $this->currentHitData = null;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return $this->count;
    }
}