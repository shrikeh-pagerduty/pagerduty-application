<?php
namespace Shrikeh\PagerDuty\Pimple;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Pimple\Provider\Http\Api;
use Shrikeh\PagerDuty\Pimple\Provider\Auth\Http;

final class Application implements ServiceProviderInterface
{
    const HTTP_DOMAIN = 'api.pagerduty.com';

    public static function container($apiKey, $domain = self::HTTP_DOMAIN)
    {
        $container = new Container();
        $container[Api::PROVIDER_HTTP_DOMAIN] = $domain;
        $container[Http::PROVIDER_AUTH_TOKEN] = $apiKey;
        $container->register(new static());

        return $container;
    }

    public function register(Container $pagerDuty)
    {
        Api::registerWith($pagerDuty);
        Http::registerWith($pagerDuty);
        \Shrikeh\PagerDuty\Pimple\Provider\Decoder\Json::registerWith($pagerDuty);
        \Shrikeh\PagerDuty\Pimple\Provider\Client\Guzzle::registerWith($pagerDuty);
        \Shrikeh\PagerDuty\Pimple\Provider\Hydrator\Uri\Guzzle::registerWith($pagerDuty);
        \Shrikeh\PagerDuty\Pimple\Provider\Repository\OnCalls\OnCalls::registerWith($pagerDuty);
        \Shrikeh\PagerDuty\Pimple\Provider\Repository\Users\Users::registerWith($pagerDuty);
        \Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource::registerWith($pagerDuty);
    }
}
