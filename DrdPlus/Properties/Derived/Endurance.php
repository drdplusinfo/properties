<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;

class Endurance extends AbstractDerivedProperty
{
    const ENDURANCE = 'endurance';

    public function getCode()
    {
        return self::ENDURANCE;
    }
}
