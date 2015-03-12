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


class MinPrice extends Parameter
{
    /**
     * @var integer
     */
    private $minPrice;

    public function __construct($minPrice = null)
    {
        if (null !== $minPrice) {
            $this->setMinPrice($minPrice);
        }
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param mixed $minPrice
     * @return self
     */
    public function setMinPrice($minPrice)
    {
        if ($minPrice < 0 || $minPrice > 4) {
            throw new \InvalidArgumentException(sprintf(
                'The price "%s" is not a valid value, valid are 0 (most affordable) to 4 (most expansive)',
                $minPrice
            ));
        }

        $this->minPrice = (int) $minPrice;

        return $this;
    }

    /**
     * @return array key => value
     */
    public function getData()
    {
        return $this->minPrice;
    }
}
