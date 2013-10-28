<?php

require __DIR__ . '/../vendor/autoload.php';

use Guzzle\Http\Client;
use Runscope\Plugin\RunscopePlugin;

$client = new Client('https://api.github.com');
$runscopePlugin = new RunscopePlugin('bucket_key');
// authenticated bucket
// $runscopePlugin = new RunscopePlugin('bucket_key', 'auth_token');

// service region
// $runscopePlugin = new RunscopePlugin('bucket_key', null, 'eu1.runscope.net');

$client->addSubscriber($runscopePlugin);

// Send the request and get the response
$request = $client->get('/');
$response = $request->send();
echo $response->getBody();
echo $response->getHeader('Content-Length');