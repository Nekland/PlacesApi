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


use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Nekland\BaseApi\Api\AbstractApi;

/**
 * Class Places
 *
 * Return a place resource
 */
class Places extends AbstractApi
{
    const URL = 'details/json';
    private $validExtensions = ['review_summary'];

    /**
     * To see a list of supported languages, please checkout https://developers.google.com/maps/faq#languagesupport
     *
     * @param string $id
     * @param array  $extensions
     * @param string  $language
     * @return array
     */
    public function getPlaceById($id, array $extensions = [], $language = null)
    {
        $this->validateExtension($extensions);
        $extensions = implode(',', $extensions);

        $body = array_merge(
            ['placeid' => $id],
            !empty($extensions) ? ['extensions' => $extensions] : [],
            null !== $language ? ['language' => $language] : []
        );

        return $this->get(self::URL, $body);
    }

    /**
     * @param array $extensions
     */
    private function validateExtension(array $extensions)
    {
        foreach ($extensions as $extension) {
            if (!in_array($extension, $this->validExtensions)) {
                throw new \InvalidArgumentException(sprintf('The extensions can only be one of "%s"', implode(',', $this->validExtensions)));
            }
        }
    }
}
