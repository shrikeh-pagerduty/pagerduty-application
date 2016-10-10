<?php

namespace Shrikeh\PagerDuty\Pimple\Provider;

use Pimple\Container;

trait RegisterWith
{
    private static $containerHash = array();

    public static function registerWith(Container $container)
    {
        $hash = spl_object_hash($container);
        if (!in_array($hash, static::$containerHash)) {
            static::$containerHash[] = $hash;
            $container->register(new static());
        }
    }

    private function __construct() {}
}
