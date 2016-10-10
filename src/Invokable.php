<?php

namespace Shrikeh\PagerDuty\Pimple;

use Pimple\Container;

interface Invokable
{
    public function __invoke(Container $c);
}
