<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;

class WoundsLimit extends AbstractDerivedProperty
{
    const WOUNDS_LIMIT = 'wounds_limit';

    public function getCode()
    {
        return self::WOUNDS_LIMIT;
    }
}
