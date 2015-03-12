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

class Location extends Parameter
{
    /**
     * @var string
     */
    private $location;

    public function __construct($latitude=null, $longitude=null)
    {
        if (null !== $latitude) {
            $this->setLocation($latitude, $longitude);
        }
    }

    /**
     * @param string $latitude
     * @param string $longitude
     */
    public function setLocation($latitude, $longitude=null)
    {
        if (null === $longitude && false === strpos($latitude, ',')) {
            throw new \InvalidArgumentException('The format of a location is "lat,long"');
        }

        if (null === $longitude) {
            $latitude = explode(',', $latitude);
            $longitude = $latitude[1];
            $latitude = $latitude[0];
        }

        $this->location = $latitude . ',' . $longitude;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return ['location' => $this->location];
    }
}
