<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use Granam\Integer\IntegerInterface;

class Toughness extends AbstractDerivedProperty
{
    const TOUGHNESS = 'toughness';

    public function __construct(Strength $strength, IntegerInterface $raceToughness)
    {
        $this->value = $strength->getValue() + $raceToughness->getValue();
    }

    public function getCode()
    {
        return self::TOUGHNESS;
    }
}
