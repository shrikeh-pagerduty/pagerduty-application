<?php

namespace Shrikeh\PagerDuty\Application\Provider\Http;

use GuzzleHttp\Psr7\Uri;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Application\Provider\Http;
use Shrikeh\PagerDuty\Application\Provider\Auth;
use Shrikeh\PagerDuty\Application\ThrowHandler\DomainNotSet;

final class Api implements ServiceProviderInterface, Http
{
    const API_ACCEPT_HEADER = 'application/vnd.pagerduty+json;version=2';

    public function register(Container $container)
    {
        if (! $container->offsetExists(static::PROVIDER_HTTP_DOMAIN)) {
            $container[static::PROVIDER_HTTP_DOMAIN] = $this->notSetHandler();
        }
        $container[static::PROVIDER_HTTP_SCHEME] = 'https';
        $container[static::PROVIDER_HTTP_TIMEOUT] = '2';
        $container[static::PROVIDER_HTTP_PORT] = null;

        $container[static::PROVIDER_HTTP_HEADERS] = function(Container $c) {
            return [
                'Accept'       =>  static::API_ACCEPT_HEADER,
                'Authorization' => sprintf(
                    'Token token=%s',
                    $c[Auth::PROVIDER_AUTH_TOKEN]
                )
            ];
        };
        $container[static::PROVIDER_HTTP_BASE_URI] = function(Container $c) {
            return Uri::fromParts([
                'scheme' => $c[static::PROVIDER_HTTP_SCHEME],
                'host' => $c[static::PROVIDER_HTTP_DOMAIN],
                'port' => $c[static::PROVIDER_HTTP_PORT],
            ]);
        };
    }

    private function notSetHandler()
    {
        $msg = 'You must set the key %s with your PagerDuty API domain';
        return new DomainNotSet(
            sprintf($msg, static::PROVIDER_HTTP_DOMAIN)
        );
    }
}
