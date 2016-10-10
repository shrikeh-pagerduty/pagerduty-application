<?php

namespace Shrikeh\PagerDuty\Application\Provider\Auth;

use Shrikeh\PagerDuty\Application\Provider\Auth;
use Shrikeh\PagerDuty\Application\ThrowHandler\TokenNotSet;
use Pimple\Container;
use Shrikeh\PagerDuty\Application\Provider\RegisterableService;

final class Http implements Auth, RegisterableService
{
    use \Shrikeh\PagerDuty\Application\Provider\RegisterWith;

    public function register(Container $container)
    {
        if (! $container->offsetExists(static::PROVIDER_AUTH_TOKEN) ) {
            $container[static::PROVIDER_AUTH_TOKEN] = $this->notSetHandler();
        }
    }

    private function notSetHandler()
    {
        $msg = 'You must set the key %s with your PagerDuty API token';
        return new TokenNotSet(
            sprintf($msg, static::PROVIDER_AUTH_TOKEN)
        );
    }
}
