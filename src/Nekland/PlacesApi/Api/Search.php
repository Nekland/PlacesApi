<?php

/**
 * This file is a part of nekland places api package
 *
 * (c) Nekland <nekland.fr@gmail.fr>
 *
 * For the full license, take a look to the LICENSE file
 * on the root directory of this project
 */

namespace Nekland\PlacesApi\Api;

use Nekland\BaseApi\Api\AbstractApi;

/**
 * Class Search
 *
 * This class ask for Google Places API for search.
 * You can learn more about "others" parameters here: https://developers.google.com/places/documentation/search
 */
class Search extends AbstractApi
{
    /**
     * @param string $location Format latitude,longitude
     * @param string $radius   Meters for search from the location point (max 50 000 meters)
     * @param array  $other    More parameters, see google documentation
     * @return array
     */
    public function search($location, $radius, array $other = [])
    {
        $body = array_merge(
            ['location' => $location, 'radius' => $radius],
            $other
        );

        return $this->get('nearbysearch/json', $body);
    }

    /**
     * @param string $text
     * @param array  $others
     * @return array
     */
    public function textSearch($text, array $others = [])
    {
        if (
            !empty($others['location']) && empty($others['radius']) ||
            !empty($others['radius']) && empty($others['location'])
        ) {
            throw new \InvalidArgumentException('If you specify location or radius, you have to specify both');
        }

        $body = array_merge(
            ['query' => $text],
            $others
        );

        return $this->get('textsearch/json', $body);
    }
}
