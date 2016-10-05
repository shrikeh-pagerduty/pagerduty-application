<?php

namespace Shrikeh\PagerDuty\Application;

use Pimple\Container;

trait VariableNotSet
{
    private $msg;

    private $errorCode;

    public function __construct($msg, $errorCode = null)
    {
        $this->msg = $msg;
        $this->errorCode = $errorCode;
    }

    public function __invoke(Container $c)
    {
        return $this->throw($c);
  }
}
