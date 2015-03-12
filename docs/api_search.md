Search API reference
====================

Retrieving API
--------------

```php
<?php

$api = new Places();

$search = $api->getSearchApi();
```

Available methods
-----------------

### Search by location and radius

```php
<?php

array Search::search($location, $radius [, array $other = []])
```

* `location`: a location (latitude,longitude), i.e. `48.8588589,2.3470599,13`
* `radius`: distance in meters around the location, i.e. `1000` (meaning 1 kilometer)
* `other`: see all possible parameters here: https://developers.google.com/places/documentation/search

### Search by text query

```php
<?php

array Search::textSearch($text [, array $others = []])
```

* `text`: some text defining a place
* `other`: see https://developers.google.com/places/documentation/search

> Notice: if you specify location, you need to specify also radius
