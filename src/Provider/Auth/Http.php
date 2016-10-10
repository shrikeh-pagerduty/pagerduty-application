<?php

namespace Shrikeh\PagerDuty\Pimple\Provider\Auth;

use Shrikeh\PagerDuty\Pimple\Provider\Auth;
use Shrikeh\PagerDuty\Pimple\ThrowHandler\TokenNotSet;
use Pimple\Container;
use Shrikeh\PagerDuty\Pimple\Provider\RegisterableService;

final class Http implements Auth, RegisterableService
{
    use \Shrikeh\PagerDuty\Pimple\Provider\RegisterWith;

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
