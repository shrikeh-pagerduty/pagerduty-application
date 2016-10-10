<?php
namespace Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource\Email as EmailHydrator;

final class Email implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_RESOURCE_EMAIL = 'hydrator.resource.email';

    use \Shrikeh\PagerDuty\Pimple\Provider\RegisterWith;

    public function register(Container $container)
    {
        $container[static::PROVIDER_HYDRATOR_RESOURCE_EMAIL] = function(Container $c) {
            return new EmailHydrator();
        };
    }
}
