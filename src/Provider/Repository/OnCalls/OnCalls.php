<?php

namespace Shrikeh\PagerDuty\Application\Provider\Repository\OnCalls;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Parser\OnCall\OnCallParser;
use Shrikeh\PagerDuty\Application\Provider\Client;
use Shrikeh\PagerDuty\Application\Provider\Decoder;
use Shrikeh\PagerDuty\Application\Provider\Repository\OnCalls as OnCallsProvider;
use Shrikeh\PagerDuty\Repository\OnCalls\OnCallsRepository;

final class OnCalls implements OnCallsProvider, ServiceProviderInterface
{
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
