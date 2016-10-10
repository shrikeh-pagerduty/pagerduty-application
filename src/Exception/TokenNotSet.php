<?php

namespace Shrikeh\PagerDuty\Pimple\Exception;

use DomainException;
use Shrikeh\PagerDuty\Pimple\Exception\VariableNotSet;

class TokenNotSet extends DomainException implements VariableNotSet
{

}
