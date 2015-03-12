Places API Reference
====================

Retrieving API
--------------

```php
<?php

$api = new Places();

$places = $api->getPlacesApi();
```


Available methods
-----------------

### Retrieve details for a place using id

```php
<?php

array public Places::getPlaceById($id, [, array $extensions = [], [ $language = null ]])

```

* `id`: a string representing a place (notice that this is **not** the `reference` of the place)
* `extensions`: an array of data you want to retrieve in addition of default data send by google
* `language`: one of the languages listed here: https://developers.google.com/maps/faq#languagesupport
