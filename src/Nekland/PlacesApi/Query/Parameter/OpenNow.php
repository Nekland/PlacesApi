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

class OpenNow extends Parameter
{
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        // Actually just doing &opennow&somethingelse in url would be ok for google
        return ['opennow' => 'true'];
    }
}
