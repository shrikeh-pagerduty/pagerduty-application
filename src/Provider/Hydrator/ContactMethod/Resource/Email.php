<?php
namespace Shrikeh\PagerDuty\Application\Provider\Hydrator\ContactMethod\Resource;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource\Email as EmailHydrator;

final class Email implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_RESOURCE_EMAIL = 'pagerduty.hydrator.resource.email';

    public function register(Container $container)
    {
        $container[static::PROVIDER_HYDRATOR_RESOURCE_EMAIL] = function(Container $c) {
            return new EmailHydrator();
        };
    }
}
