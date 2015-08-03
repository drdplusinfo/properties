<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;

class Senses extends AbstractDerivedProperty
{
    const SENSES = 'senses';

    public function getCode()
    {
        return self::SENSES;
    }
}
