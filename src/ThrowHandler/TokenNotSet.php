<?php

namespace Shrikeh\PagerDuty\Pimple\ThrowHandler;

use Shrikeh\PagerDuty\Pimple\Invokable;
use Shrikeh\PagerDuty\Pimple\ThrowHandler;
use Shrikeh\PagerDuty\Pimple\Exception\TokenNotSet as TokenNotSetException;

final class TokenNotSet implements ThrowHandler, Invokable
{
    use \Shrikeh\PagerDuty\Pimple\VariableNotSet;

    public function throw()
    {
      throw new TokenNotSetException(
          $this->msg,
          $this->errorCode
      );
    }
}
