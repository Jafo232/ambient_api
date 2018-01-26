# Ambient API
Laravel Package For Accessing Ambient API.  Currently their API is in beta, see this Facebook group for more information: https://www.facebook.com/search/top/?q=ambient%20weather%20network%20api

**Install with composer:**

composer require jafo232/ambientapi

**Add to your providers in config/app.php:**

jafo232\ambientapi\AmbientApiServiceProvider::class,

**Add to your aliases:**

'Ambient' => jafo232\ambientapi\AmbientApiFacade::class,

**Publish the config file:**

php artisan vendor:publish

You can edit the config/ambient.php directly or edit your .env file and add:

AMBIENT_APPLICATION_KEY=YOUR_APPLICATION_KEY_HERE

AMBIENT_API_KEY=YOUR_API_KEY_HERE

Make sure you add your real keys.


