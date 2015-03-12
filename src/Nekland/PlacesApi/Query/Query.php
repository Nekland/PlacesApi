<?php

namespace Nekland\PlacesApi\Query;

use Nekland\PlacesApi\Query\Parameter\Language;
use Nekland\PlacesApi\Query\Parameter\Location;
use Nekland\PlacesApi\Query\Parameter\MaxPrice;
use Nekland\PlacesApi\Query\Parameter\MinPrice;
use Nekland\PlacesApi\Query\Parameter\Name;
use Nekland\PlacesApi\Query\Parameter\OpenNow;
use Nekland\PlacesApi\Query\Parameter\PageToken;
use Nekland\PlacesApi\Query\Parameter\Radius;
use Nekland\PlacesApi\Query\Parameter\RankBy;

/**
 * This file is a part of nekland places api package
 *
 * (c) Nekland <nekland.fr@gmail.fr>
 *
 * For the full license, take a look to the LICENSE file
 * on the root directory of this project
 */

class Query
{
    /**
     * @var Parameter\Parameter[]
     */
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @return Language
     */
    public function language()
    {
        return $this->items[] = new Language();
    }

    /**
     * @return Location
     */
    public function location()
    {
        return $this->items[] = new Location();
    }

    /**
     * @return MaxPrice
     */
    public function maxPrice()
    {
        return $this->items[] = new MaxPrice();
    }

    /**
     * @return MinPrice
     */
    public function minPrice()
    {
        return $this->items[] = new MinPrice();
    }

    /**
     * @return Name
     */
    public function name()
    {
        return $this->items[] = new Name();
    }

    /**
     * @return OpenNow
     */
    public function openNow()
    {
        return $this->items[] = new OpenNow();
    }

    /**
     * @return PageToken
     */
    public function pageToken()
    {
        return $this->items[] = new PageToken();
    }

    /**
     * @return Radius
     */
    public function radius()
    {
        return $this->items[] = new Radius();
    }

    /**
     * @return RankBy
     */
    public function rankBy()
    {
        return $this->items[] = new RankBy();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $res = '';
        $max = count($this->items) - 1;

        foreach ($this->items as $key => $item) {
            $data = $item->getData();
            if (is_array($data)) {
                $res .= $data[0] . '=' . $data[1];
            } else {
                $res .= $data;
            }

            if ($max !== $key && !empty($data)) {
                $res .= '&';
            }
        }

        return $res;
    }
}
