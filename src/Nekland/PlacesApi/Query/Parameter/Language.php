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

class Language extends Parameter
{
    /**
     * @var array
     */
    private $languagesAvailable = ['fr', 'en'];

    /**
     * @var string
     */
    private $language;

    public function __construct($language = null)
    {
        if (null !== $language) {
            $this->setLanguage($language);
        }
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return self
     */
    public function setLanguage($language)
    {
        if (!in_array($language, $this->languagesAvailable)) {
            throw new \InvalidArgumentException(sprintf(
                'The language cannot be "%", please check the list of available languages.',
                $language
            ));
        }
        $this->language = $language;

        return $this;
    }

    /**
     * @return array key => value
     */
    public function getData()
    {
        return ['language' => $this->language];
    }
}
