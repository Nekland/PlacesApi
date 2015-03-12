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


class Radius extends Parameter
{
    /**
     * @var integer
     */
    private $radius;

    public function __construct($radius = null)
    {
        if (null !== $radius) {
            $this->setRadius($radius);
        }
    }

    /**
     * @return int
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param int $radius
     * @return self
     */
    public function setRadius($radius)
    {
        if ($radius < 0 || $radius > 50000) {
            throw new \InvalidArgumentException('The radius should be > 0 and < 50 000.');
        }

        $this->radius = (int) $radius;

        return $this;
    }

    /**
     * @return array key => value
     */
    public function getData()
    {
        return ['radius' => $this->radius];
    }
}
