<?php

namespace Shrikeh\PagerDuty\Application;

use Pimple\Container;

interface Invokable
{
    public function __invoke(Container $c);
}
