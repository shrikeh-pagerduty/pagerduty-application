<?php

namespace Shrikeh\PagerDuty\Application\Exception;

use DomainException;
use Shrikeh\PagerDuty\Application\Exception\VariableNotSet;

class DomainNotSet extends DomainException implements VariableNotSet
{

}
