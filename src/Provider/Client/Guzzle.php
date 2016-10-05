<?php

namespace Shrikeh\PagerDuty\Application\Provider\Client;

use GuzzleHttp\Client as GuzzleClient;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Client\Guzzle as Client;
use Shrikeh\PagerDuty\Application\Provider\Client as ClientServiceProvider;
use Shrikeh\PagerDuty\Application\Provider\Http;

final class Guzzle implements ServiceProviderInterface, ClientServiceProvider
{
    const PROVIDER_CLIENT_GUZZLE = 'pagerduty.client.guzzle';

    public function register(Container $container)
    {
        $container = $this->guzzle($container);

        $container[static::PROVIDER_CLIENT] = function(Container $c) {
            return new Client($c[static::PROVIDER_CLIENT_GUZZLE]);
        };

        return $container;
    }

    private function guzzle(Container $container)
    {
        $container[static::PROVIDER_CLIENT_GUZZLE] = function(Container $c) {
            return new GuzzleClient([
              'base_uri' => $c[Http::PROVIDER_HTTP_BASE_URI],
              'timeout' => $c[Http::PROVIDER_HTTP_TIMEOUT],
              'headers' => $c[Http::PROVIDER_HTTP_HEADERS],
            ]);
        };
        return $container;
    }
}
