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
use Nekland\BaseApi\Exception\AuthenticationException;
use Nekland\BaseApi\Exception\QuotaLimitException;

class Autocomplete extends AbstractApi
{
    const URL = 'autocomplete/json';

    public function autocomplete($input, array $other = [])
    {
        $body = array_merge(['input' => $input], $other);

        $result = $this->get(self::URL, $body);

        switch($result['status']) {
            case 'OK':
                return $result['predictions'];

            case 'ZERO_RESULTS':
                return [];

            case 'OVER_QUERY_LIMIT':
                throw new QuotaLimitException();
                break;

            case 'REQUEST_DENIED':
                throw new AuthenticationException();
                break;

            case 'INVALID_REQUEST':
                throw new \InvalidArgumentException('The input is not correct for autocomplete.');
                break;

            default:
                throw new \RuntimeException('This case is not supported, please report these to NeklandPlacesApi.');
        }
    }
}
