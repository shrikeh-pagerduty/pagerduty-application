<?php
namespace Shrikeh\PagerDuty\Pimple\Provider\Hydrator;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod;
use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\Uri;

use Shrikeh\PagerDuty\Hydrator\User as UserHydrator;

final class User implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_USER = 'hydrator.user';

    use \Shrikeh\PagerDuty\Pimple\Provider\RegisterWith;

    public function register(Container $container)
    {
        $container = $this->addResourceProviders($container);

        $container[static::PROVIDER_HYDRATOR_USER] = function(Container $c) {
          return new UserHydrator(
            $c[ContactMethod::PROVIDER_HYDRATOR_CONTACTMETHOD],
            $c[Uri::PROVIDER_HYDRATOR_URI]
          );
        };
    }

    private function addResourceProviders(Container $container)
    {
        if (!$container->offsetExists(ContactMethod::PROVIDER_HYDRATOR_CONTACTMETHOD)) {
            $container->register(new ContactMethod());
        }
        return $container;
    }
}
