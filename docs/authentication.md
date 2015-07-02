Authentication
==============

Public API access
-----------------

To make this authentication work, you just have to generate an APIKEY from the google developer console. You can do it like that:

1. Go to https://console.developers.google.com/project;
2. Create your project if it's not already in the project list (we do not care about the project id);
3. Click on the name of your project in the list;
4. Click on APIS & AUTH > API and on "Places API" in the API list and click on "OFF" button to make it becoming "ON";
5. Click on APIS & AUTH > Credentials;
6. In the section Public API access, create a new key of type Server Key and specify your IP address.

> Be careful, Google take care of IPv6.

```php
<?php

$api = new Places();
$api->useAuthentication([
    'PublicApiAccess',
    ['key' => 'MY_PLACES_APIKEY']
]);
```
