<?php

namespace Shrikeh\PagerDuty\Pimple;

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
