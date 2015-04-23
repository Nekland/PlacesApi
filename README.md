Places API
==========

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Nekland/PlacesApi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Nekland/PlacesApi/?branch=master)
[![Build Status](https://travis-ci.org/Nekland/PlacesApi.svg?branch=master)](https://travis-ci.org/Nekland/PlacesApi)

This library helps you to ask for Google Places API.

Installation
------------

It's simple ! Just use the following composer command line.

```bash
composer require 'nekland/places-api:~1.0'
```

Usage
-----

```php
<?php

use Nekland\PlacesApi\Places;

$api = new Places();

$api->useAuthentication('PublicApiAccess', ['key' => 'MY KEY']);

$result = $api->getSearchApi()->search('49.8445057,3.2912589', 1000);
```

> See authentication part to know how to get a key

Who needs a documentation ? NeklandPlacesApi supports provide auto-completion for compatibles IDEs.

If yours don't, no problem: the documentation is available [here](docs/index.md).
