<?php
namespace Shrikeh\PagerDuty\Application\Provider\Hydrator\ContactMethod\Resource;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource\Sms as SmsHydrator;

final class Sms implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_RESOURCE_SMS = 'pagerduty.hydrator.resource.sms';

    public function register(Container $container)
    {
        $container[static::PROVIDER_HYDRATOR_RESOURCE_SMS] = function(Container $c) {
            return new SmsHydrator();
        };
    }
}
