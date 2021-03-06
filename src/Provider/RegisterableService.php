<?php

namespace Shrikeh\PagerDuty\Pimple\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

interface RegisterableService extends ServiceProviderInterface
{
    public static function registerWith(Container $container);
}
