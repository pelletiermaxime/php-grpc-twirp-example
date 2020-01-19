<?php

declare(strict_types=1);

namespace Demo;

use Twirp\ServerHooks;

/**
 * Default noop implementation for ServerHooks.
 * Can be used as a base class to implement only a subset of hooks.
 */
class TestHook implements ServerHooks
{
    private $reqStart;

    /**
     * {@inheritdoc}
     */
    public function requestReceived(array $ctx): array
    {
        $this->reqStart = microtime(true);
        file_put_contents('debug.log', "\nrequestReceived\n", FILE_APPEND);
        file_put_contents('debug.log', var_export($ctx, true), FILE_APPEND);
        file_put_contents('debug.log', "\n-----------------------\n", FILE_APPEND);
        return $ctx;
    }

    /**
     * {@inheritdoc}
     */
    public function requestRouted(array $ctx): array
    {
        file_put_contents('debug.log', "\nrequestRouted\n", FILE_APPEND);
        file_put_contents('debug.log', var_export($ctx, true), FILE_APPEND);
        file_put_contents('debug.log', "\n-----------------------\n", FILE_APPEND);
        return $ctx;
    }

    /**
     * {@inheritdoc}
     */
    public function responsePrepared(array $ctx): array
    {
        file_put_contents('debug.log', "\nresponsePrepared\n", FILE_APPEND);
        file_put_contents('debug.log', var_export($ctx, true), FILE_APPEND);
        file_put_contents('debug.log', "\n-----------------------\n", FILE_APPEND);
        return $ctx;
    }

    /**
     * {@inheritdoc}
     */
    public function responseSent(array $ctx): void
    {
        file_put_contents('debug.log', "\nresponseSent\n", FILE_APPEND);
        file_put_contents('debug.log', var_export($ctx, true), FILE_APPEND);
        $tookTime = microtime(true) - $this->reqStart;
        file_put_contents('debug.log', "\nTook time: $tookTime" , FILE_APPEND);
        file_put_contents('debug.log', "\n-----------------------\n", FILE_APPEND);
    }

    /**
     * {@inheritdoc}
     */
    public function error(array $ctx, \Throwable $error): array
    {
        file_put_contents('debug.log', "\nerror\n", FILE_APPEND);
        file_put_contents('debug.log', var_export($ctx, true), FILE_APPEND);
        file_put_contents('debug.log', "\n-----------------------\n", FILE_APPEND);
        return $ctx;
    }
}
