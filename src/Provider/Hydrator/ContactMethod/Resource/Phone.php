<?php
namespace Shrikeh\PagerDuty\Application\Provider\Hydrator\ContactMethod\Resource;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource\Phone as PhoneHydrator;

final class Phone implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_RESOURCE_PHONE = 'pagerduty.hydrator.resource.phone';

    public function register(Container $container)
    {
        $container[static::PROVIDER_HYDRATOR_RESOURCE_PHONE] = function(Container $c) {
            return new PhoneHydrator();
        };
    }
}
