<?php
namespace Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource\Push as PushHydrator;

final class Push implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_RESOURCE_PUSH = 'pagerduty.hydrator.resource.push';

    use \Shrikeh\PagerDuty\Pimple\Provider\RegisterWith;
    
    public function register(Container $container)
    {
        $container[static::PROVIDER_HYDRATOR_RESOURCE_PUSH] = function(Container $c) {
            return new PushHydrator();
        };
    }
}
