<?php

/**
 * This file is a part of nekland places api package
 *
 * (c) Nekland <nekland.fr@gmail.fr>
 *
 * For the full license, take a look to the LICENSE file
 * on the root directory of this project
 */

namespace Nekland\PlacesApi\Query\Parameter;


class RankBy extends Parameter
{
    /**
     * @var string "prominence" or "distance"
     */
    protected $rankBy;

    /**
     * By default it's by `prominence`
     * (that mean by importance of the place: numbers of check in, number of require from your app....)
     */
    public function __construct()
    {
        $this->byProminence();
    }

    /**
     * @return self
     */
    public function byProminence()
    {
        $this->rankBy = 'prominence';

        return $this;
    }

    /**
     * @return self
     */
    public function byDistance()
    {
        $this->rankBy = 'distance';

        return $this;
    }

    /**
     * @return array key => value
     */
    public function getData()
    {
        return ['rankBy' => $this->rankBy];
    }
}
