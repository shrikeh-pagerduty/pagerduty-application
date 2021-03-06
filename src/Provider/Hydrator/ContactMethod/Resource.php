<?php
namespace Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource\Email;
use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource\Phone;
use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource\Push;
use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource\Sms;

use Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource as ResourceHydrator;

final class Resource implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_RESOURCE = 'hydrator.resource';

    use \Shrikeh\PagerDuty\Pimple\Provider\RegisterWith;

    public function register(Container $container)
    {
        $container = $this->addResourceProviders($container);
        $container[static::PROVIDER_HYDRATOR_RESOURCE] = function(Container $c) {
          return ResourceHydrator::fromArray([
            $c[Email::PROVIDER_HYDRATOR_RESOURCE_EMAIL],
            $c[Phone::PROVIDER_HYDRATOR_RESOURCE_PHONE],
            $c[Push::PROVIDER_HYDRATOR_RESOURCE_PUSH],
            $c[Sms::PROVIDER_HYDRATOR_RESOURCE_SMS],
          ]);
        };
    }

    private function addResourceProviders(Container $container)
    {
        $providers = [
          Email::PROVIDER_HYDRATOR_RESOURCE_EMAIL => Email::class,
          Phone::PROVIDER_HYDRATOR_RESOURCE_PHONE => Phone::class,
          Push::PROVIDER_HYDRATOR_RESOURCE_PUSH => Push::class,
          Sms::PROVIDER_HYDRATOR_RESOURCE_SMS => Sms::class,
        ];
        foreach ($providers as $provider => $class) {
            if (!$container->offsetExists($provider)) {
                $class::registerWith($container);
            }
        }
        return $container;
    }
}
