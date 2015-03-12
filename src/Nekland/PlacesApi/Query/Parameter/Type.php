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


class Type extends Parameter
{
    /**
     * @var array
     */
    private $types;

    /**
     * @var array
     */
    private $validTypes = [];

    public function __construct(array $types = [])
    {
        // Drop array keys
        foreach ($types as $type) {
            $this->addType($type);
        }
    }

    /**
     * @param string $type
     * @return self
     */
    public function addType($type)
    {
        $type = strtolower($type);
        $this->checkType($type);
        $this->types[] = $type;

        return $this;
    }

    /**
     * @param string $type
     * @throws \InvalidArgumentException
     */
    public function checkType($type)
    {
        if (!in_array($type, $this->validTypes)) {
            throw new \InvalidArgumentException(sprintf(
                'The type cannot be "%", supported are: %s',
                $type,
                implode(',', $this->validTypes)
            ));
        }
    }

    /**
     * @return array key => value
     */
    public function getData()
    {
        return ['types' => implode('|', $this->types)];
    }
}
