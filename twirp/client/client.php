<?php

use Twirp\Example\Haberdasher\HaberdasherClient;
use Twirp\Example\Haberdasher\Size;

require __DIR__ . '/vendor/autoload.php';

$client = new HaberdasherClient($argv[1]);

//while (true) {
    $size = new Size();
    $size->setInches(10);

    try {
        $start = microtime(true);
        $hat = $client->MakeHat([], $size);
        var_dump($hat->serializeToJsonString());
        echo microtime(true) - $start;

        printf("I received a %s %s\n", $hat->getColor(), $hat->getName());
    } catch (\Twirp\Error $e) {
        if (($cause = $e->getMeta('cause')) !== null) {
            printf("%s: %s (%s)\n", strtoupper($e->getErrorCode()), $e->getMessage(), $cause);
        } else {
            printf("%s: %s\n", strtoupper($e->getErrorCode()), $e->getMessage());
        }
    }

//    sleep(1);
//}
