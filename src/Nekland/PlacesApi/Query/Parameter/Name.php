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


class Name extends Parameter
{
    /**
     * @var string
     */
    private $name;

    public function __construct($name = null)
    {
        if (null !== $name) {
            $this->setName($name);
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array key => value
     */
    public function getData()
    {
        return ['name' => $this->name];
    }
}
