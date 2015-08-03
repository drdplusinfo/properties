<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;

class FatigueLimit extends AbstractDerivedProperty
{
    const FATIGUE_LIMIT = 'fatigue_limit';

    public function getCode()
    {
        return self::FATIGUE_LIMIT;
    }
}
