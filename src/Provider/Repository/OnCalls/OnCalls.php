<?php

namespace Shrikeh\PagerDuty\Pimple\Provider\Repository\OnCalls;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Parser\OnCall\OnCallParser;
use Shrikeh\PagerDuty\Pimple\Provider\Client;
use Shrikeh\PagerDuty\Pimple\Provider\Decoder;
use Shrikeh\PagerDuty\Pimple\Provider\Repository\OnCalls as OnCallsProvider;
use Shrikeh\PagerDuty\Repository\OnCalls\OnCallsRepository;

final class OnCalls implements OnCallsProvider, ServiceProviderInterface
{
    use \Shrikeh\PagerDuty\Pimple\Provider\RegisterWith;

    public function register(Container $container)
    {
        $container[static::PROVIDER_REPOSITORY_ONCALLS] = function(Container $c) {
            return new OnCallsRepository(
                $c[Client::PROVIDER_CLIENT],
                new OnCallParser($c[Decoder::PROVIDER_DECODER])
            );
        };
    }
}
