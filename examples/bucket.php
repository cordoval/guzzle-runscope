<?php

require __DIR__ . '/../vendor/autoload.php';

use Guzzle\Http\Client;
use Guzzle\Plugin\Log\LogPlugin;
use Runscope\Plugin\RunscopePlugin;

$client = new Client('https://api.github.com');
$runscopePlugin = new RunscopePlugin('bucketKeyHere');
// $runscopePlugin = new RunscopePlugin('bucketKeyHere', 'authTokenHere');
// $runscopePlugin = new RunscopePlugin('bucketKeyHere', null, 'eu1.runscope.net');

$client->addSubscriber($runscopePlugin);
$client->addSubscriber(LogPlugin::getDebugPlugin()); // just to easy debug

// Send the request and get the response
$request = $client->get('/');
$response = $request->send();
echo $response->getBody();
echo $response->getHeader('Content-Length');