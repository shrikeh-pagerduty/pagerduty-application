<?php
namespace Shrikeh\PagerDuty\Pimple\Provider\Hydrator;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource;
use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\Uri;

use Shrikeh\PagerDuty\Hydrator\ContactMethod as ContactMethodHydrator;

final class ContactMethod implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_CONTACTMETHOD = 'hydrator.contactmethod';

    public function register(Container $container)
    {
        $container = $this->addResourceProviders($container);

        $container[static::PROVIDER_HYDRATOR_CONTACTMETHOD] = function(Container $c) {
          return new ContactMethodHydrator(
            $c[Resource::PROVIDER_HYDRATOR_RESOURCE],
            $c[Uri::PROVIDER_HYDRATOR_URI]
          );
        };
    }

    private function addResourceProviders(Container $container)
    {
        if (!$container->offsetExists(Resource::PROVIDER_HYDRATOR_RESOURCE)) {
            Resource::registerWith($container);
        }
        return $container;
    }
}
