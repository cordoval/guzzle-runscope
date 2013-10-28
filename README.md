[Guzzle](http://guzzlephp.org) plugin for Runscope 

- Requires a free Runscope account, [sign up here](https://www.runscope.com/signup)
- Automatically create Runscope URLs for your requests
- Automatically create proper `Runscope-Request-Port` header when using ports
- Support for authenticated buckets and service regions (see example below)

Install by issuing:

```cli
    ~ composer require runscope/guzzle-plugin
```

Usage is as follows:

```php
<?php
require __DIR__ . '/../vendor/autoload.php';

use Guzzle\Http\Client;
use Guzzle\Plugin\Log\LogPlugin;
use Runscope\Plugin\RunscopePlugin;

$client = new Client('https://api.github.com');

$runscopePlugin = new RunscopePlugin('bucket_key');

// authenticated bucket
// $runscopePlugin = new RunscopePlugin('bucket_key', 'authTokenHere');

// service region
// $runscopePlugin = new RunscopePlugin('bucket_key', null, 'eu1.runscope.net');

$client->addSubscriber($runscopePlugin);

// Send the request and get the response
$response = $client->get('/')->send();
```

Enjoy!
