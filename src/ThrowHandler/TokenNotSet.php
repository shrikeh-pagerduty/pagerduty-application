<?php

namespace Shrikeh\PagerDuty\Application\ThrowHandler;

use Shrikeh\PagerDuty\Application\Invokable;
use Shrikeh\PagerDuty\Application\ThrowHandler;
use Shrikeh\PagerDuty\Application\Exception\TokenNotSet as TokenNotSetException;

final class TokenNotSet implements ThrowHandler, Invokable
{
    use \Shrikeh\PagerDuty\Application\VariableNotSet;

    public function throw()
    {
      throw new TokenNotSetException(
          $this->msg,
          $this->errorCode
      );
    }
}
