<?php

use Demo\Haberdasher;
use Demo\TestHook;
use GuzzleHttp\Psr7\ServerRequest;
use Twirp\Example\Haberdasher\HaberdasherServer;
use Twirp\Server;

require 'vendor/autoload.php';

$request = ServerRequest::fromGlobals();

$server = new Server();
$hook = new TestHook();
$handler = new HaberdasherServer(new Haberdasher(), $hook);
#$handler = new HaberdasherServer(new Haberdasher());
$server->registerServer(HaberdasherServer::PATH_PREFIX, $handler);

$response = $server->handle($request);

if (!headers_sent()) {
    // status
    header(
        sprintf(
            'HTTP/%s %s %s',
            $response->getProtocolVersion(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        ),
        true,
        $response->getStatusCode()
    );
    // headers
    foreach ($response->getHeaders() as $header => $values) {
        foreach ($values as $value) {
            header($header.': '.$value, false, $response->getStatusCode());
        }
    }
}
echo $response->getBody();
