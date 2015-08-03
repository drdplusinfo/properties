<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;

class Speed extends AbstractDerivedProperty
{
    const SPEED = 'speed';

    public function getCode()
    {
        return self::SPEED;
    }
}
