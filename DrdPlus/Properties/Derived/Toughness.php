<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;

class Toughness extends AbstractDerivedProperty
{
    const TOUGHNESS = 'toughness';

    public function getCode()
    {
        return self::TOUGHNESS;
    }
}
