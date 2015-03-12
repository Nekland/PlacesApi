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


class PageToken extends Parameter
{
    /**
     * @var string
     */
    private $pageToken;

    public function __construct($pageToken = null)
    {
        if (null !== $pageToken) {
            $this->setPageToken($pageToken);
        }
    }

    /**
     * @return string
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param string $pageToken
     * @return self
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return ['pagetoken' => $this->pageToken];
    }
}
