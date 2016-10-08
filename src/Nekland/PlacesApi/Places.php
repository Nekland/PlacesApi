<?php

/**
 * This file is a part of nekland places api package
 *
 * (c) Nekland <nekland.fr@gmail.fr>
 *
 * For the full license, take a look to the LICENSE file
 * on the root directory of this project
 */

namespace Nekland\PlacesApi;

use Nekland\BaseApi\ApiFactory;
use Nekland\BaseApi\Http\Auth\AuthFactory;
use Nekland\BaseApi\Http\HttpClientFactory;
use Nekland\BaseApi\Transformer\TransformerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class Places
 *
 * @method \Nekland\PlacesApi\Api\Search getSearchApi()
 * @method \Nekland\PlacesApi\Api\Autocomplete getAutocompleteApi()
 * @method \Nekland\PlacesApi\Api\Places getPlacesApi()
 * @method \Nekland\PlacesApi\Api\Photos getPhotosApi()
 */
class Places extends ApiFactory
{
    /**
     * @var array
     */
    private $options = [
        'base_url' => 'https://maps.googleapis.com/maps/api/place/',
        'user_agent' => 'php-places-api (https://github.com/Nekland/PlacesApi)'
    ];


    public function __construct(
        array $options = [],
        HttpClientFactory $httpClientFactory = null,
        EventDispatcher $dispatcher = null,
        TransformerInterface $transformer = null,
        AuthFactory $authFactory = null
    ) {
        $this->options = array_merge($this->options, $options);
        parent::__construct(new HttpClientFactory($this->options));
        $this->getAuthFactory()->addNamespace('Nekland\PlacesApi\Http\Auth');
    }

    /**
     * Return array of namespaces where AbstractApi instance are localized
     *
     *
     * @return string[] Example: ['Nekland\BaseApi\Api']
     */
    protected function getApiNamespaces()
    {
        return ['Nekland\PlacesApi\Api'];
    }
}
