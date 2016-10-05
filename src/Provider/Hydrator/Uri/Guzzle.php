<?php
namespace Shrikeh\PagerDuty\Application\Provider\Hydrator\Uri;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Application\Provider\Hydrator\Uri;
use Shrikeh\PagerDuty\Hydrator\Uri\Guzzle as GuzzleHydrator;

final class Guzzle implements ServiceProviderInterface, Uri
{
    public function register(Container $container)
    {
        $container[static::PROVIDER_HYDRATOR_URI] = function(Container $c) {
            return new GuzzleHydrator();
        };
    }
}
