Places API
==========

Installation
------------

```bash
composer require 'nekland/places-api:~1.0'
```

This will add `nekland/youtube-api` to your composer.json file and automatically download it to your `vendor` folder.


Usage
-----


1. Declare a new instance of Places object
2. Configure an authentication strategy
3. Get an API class and ask data from it

Example:

```php
<?php

use Nekland\PlacesApi\Places;

$api = new Places();

$api->useAuthentication('PublicApiAccess', ['key' => 'SOME KEY']);

$result = $api->getSearchApi()->search('49.8445057,3.2912589', 1000);

```

More
----

1. Learn more about [authentication](authentication.md)
2. [Api Search reference](api_search.md)
3. [Api Places reference](api_places.md)
4. [Api Autocomplete reference](api_autocomplete.md)
