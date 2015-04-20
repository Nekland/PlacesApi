<?php

/**
 * This file is a part of nekland places api package
 *
 * (c) Nekland <nekland.fr@gmail.fr>
 *
 * For the full license, take a look to the LICENSE file
 * on the root directory of this project
 */

namespace Nekland\PlacesApi\Iterator;

use Nekland\PlacesApi\Api\Search;

class SearchIterator implements \Iterator
{
    /**
     * @var Search
     */
    private $api;

    /**
     * @var array
     */
    private $body;

    /**
     * @var string
     */
    private $currentPage;

    /**
     * @var string
     */
    private $nextPage;

    /**
     * @var integer
     */
    private $key;

    public function __construct(Search $api, array $body)
    {
        $this->api = $api;
        $this->body = $body;
        $this->key = 0;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        // Getting the first page
        if ($this->currentPage === null) {
            $data = $this->api->searchWithBody($this->body);
            if (isset($data['next_page_token'])) {
                $this->nextPage = $data['next_page_token'];
            }

            return $data;
        }

        // Getting another page
        $body = array_merge($this->body, ['pagetoken' => $this->currentPage]);
        $data = $this->api->searchWithBody($body);
        if (isset($data['next_page_token'])) {
            $this->nextPage = $data['next_page_token'];
        } else {
            $this->nextPage = null;
        }

        return $data;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->currentPage = $this->nextPage;
        $this->key++;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        // fails only when
        if ($this->key !== 0 && $this->currentPage === null) {
            return false;
        }

        return true;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->key = 0;
        $this->currentPage = null;
        $this->nextPage = null;
    }
}
