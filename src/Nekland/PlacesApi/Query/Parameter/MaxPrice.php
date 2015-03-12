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


class MaxPrice extends Parameter
{
    /**
     * @var integer (0-4)
     */
    private $maxPrice;

    public function __construct($maxPrice = null)
    {
        if (null !== $maxPrice) {
            $this->setMaxPrice($maxPrice);
        }
    }

    /**
     * @return int
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param int $maxPrice
     * @return self
     */
    public function setMaxPrice($maxPrice)
    {
        if ($maxPrice < 0 || $maxPrice > 4) {
            throw new \InvalidArgumentException(sprintf(
                'The price "%s" is not a valid value, valid are 0 (most affordable) to 4 (most expansive)',
                $maxPrice
            ));
        }

        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return ['maxprice' => $this->maxPrice];
    }
}
