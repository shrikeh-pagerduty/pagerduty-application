<?php

namespace Shrikeh\PagerDuty\Pimple\Exception;

use DomainException;
use Shrikeh\PagerDuty\Pimple\Exception\VariableNotSet;

class DomainNotSet extends DomainException implements VariableNotSet
{

}
