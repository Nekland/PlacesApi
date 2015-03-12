<?php

/**
 * This file is a part of nekland places api package
 *
 * (c) Nekland <nekland.fr@gmail.fr>
 *
 * For the full license, take a look to the LICENSE file
 * on the root directory of this project
 */

namespace Nekland\PlacesApi\Http\Auth;

use Nekland\BaseApi\Exception\MissingOptionException;
use Nekland\BaseApi\Http\Auth\AuthStrategyInterface;
use Nekland\BaseApi\Http\Event\RequestEvent;

class PublicApiAccess implements AuthStrategyInterface
{
    /**
     * @var array
     */
    private $options;

    public function setOptions(array $options)
    {
        if (empty($options['key'])) {
            throw new MissingOptionException(
                sprintf('You have to define the "key" option in order to make %s auth work.', get_class($this))
            );
        }
        $this->options = $options;
    }

    public function auth(RequestEvent $event)
    {
        $request = $event->getRequest();
        $request->setParameter('key', $this->options['key']);
    }
}
