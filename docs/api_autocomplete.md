Autocomplete API reference
====================

Retrieving API
--------------

```php
<?php

$api = new Autocomplete();

$autocomplete = $api->getAutocompleteApi();
```

Available methods
-----------------

### Get autocomplete from input

```php
<?php

array Autocomplete::complete($input [, array $other = []])
```

* `input`: the input of your user
* `other`: see documentation here https://developers.google.com/places/documentation/autocomplete
