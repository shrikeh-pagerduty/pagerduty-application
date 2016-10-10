<?php
namespace Shrikeh\PagerDuty\Pimple\Provider\Hydrator\Uri;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\Uri;
use Shrikeh\PagerDuty\Hydrator\Uri\Guzzle as GuzzleHydrator;

final class Guzzle implements ServiceProviderInterface, Uri
{
    use \Shrikeh\PagerDuty\Pimple\Provider\RegisterWith;

    public function register(Container $container)
    {
        $container[static::PROVIDER_HYDRATOR_URI] = function(Container $c) {
            return new GuzzleHydrator();
        };
    }
}
