<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Helper\Iterators;

use Elasticsearch\Client;
use Iterator;

/**
 * Class SearchResponseIterator
 *
 * @see      Iterator
 */
class SearchResponseIterator implements Iterator
{

    /**
     * @var Client
     */
    private $client;

    /**
     * @var array
     */
    private $params;

    /**
     * @var int
     */
    private $current_key;

    /**
     * @var array
     */
    private $current_scrolled_response;

    /**
     * @var string
     */
    private $scroll_id;

    /**
     * @var string duration
     */
    private $scroll_ttl;

    /**
     * Constructor
     *
     * @param Client $client
     * @param array  $search_params  Associative array of parameters
     * @see   Client::search()
     */
    public function __construct(Client $client, array $search_params)
    {
        $this->client = $client;
        $this->params = $search_params;

        if (isset($search_params['scroll'])) {
            $this->scroll_ttl = $search_params['scroll'];
        }
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        $this->clearScroll();
    }

    /**
     * Sets the time to live duration of a scroll window
     *
     * @param  string $time_to_live
     * @return $this
     */
    public function setScrollTimeout($time_to_live)
    {
        $this->scroll_ttl = $time_to_live;
        return $this;
    }

    /**
     * Clears the current scroll window if there is a scroll_id stored
     *
     * @return void
     */
    private function clearScroll()
    {
        if (!empty($this->scroll_id)) {
            $this->client->clearScroll(
                array(
                    'scroll_id' => $this->scroll_id,
                    'client' => array(
                        'ignore' => 404
                    )
                )
            );
            $this->scroll_id = null;
        }
    }

    /**
     * Rewinds the iterator by performing the initial search.
     *
     *
     * @return void
     * @see    Iterator::rewind()
     */
    public function rewind()
    {
        $this->clearScroll();
        $this->current_key = 0;
        $this->current_scrolled_response = $this->client->search($this->params);
        $this->scroll_id = $this->current_scrolled_response['_scroll_id'];
    }

    /**
     * Fetches every "page" after the first one using the lastest "scroll_id"
     *
     * @return void
     * @see    Iterator::next()
     */
    public function next()
    {
        $this->current_scrolled_response = $this->client->scroll([
            'scroll_id' => $this->scroll_id,
            'scroll'    => $this->scroll_ttl
        ]);
        $this->scroll_id = $this->current_scrolled_response['_scroll_id'];
        $this->current_key++;
    }

    /**
     * Returns a boolean value indicating if the current page is valid or not
     *
     * @return bool
     * @see    Iterator::valid()
     */
    public function valid()
    {
        return isset($this->current_scrolled_response['hits']['hits'][0]);
    }

    /**
     * Returns the current "page"
     *
     * @return array
     * @see    Iterator::current()
     */
    public function current()
    {
        return $this->current_scrolled_response;
    }

    /**
     * Returns the current "page number" of the current "page"
     *
     * @return int
     * @see    Iterator::key()
     */
    public function key()
    {
        return $this->current_key;
    }
}
