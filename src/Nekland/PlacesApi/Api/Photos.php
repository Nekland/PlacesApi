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

class Photos extends AbstractApi
{
    const MAX_WIDTH = 'maxwidth';

    const MAX_HEIGHT = 'maxheight';

    /**
     * IMPORTANT: needs an appropriate response header
     *
     * @param string $reference The photo reference
     * @param int $maxSize Maximum size between 1 and 1600 px
     * @param string $dimension Width or height (use constants)
     *
     * @return array
     */
    public function getPhotoByReference($reference, $maxSize, $dimension)
    {
        $request = $this->get(
            'photo', [
                'photoreference' => $reference,
                $dimension => $maxSize,
            ]
        );
        return $request;
    }
}
