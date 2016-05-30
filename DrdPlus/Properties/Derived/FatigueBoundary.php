<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Tables\Measurements\Fatigue\FatigueBonus;
use DrdPlus\Tables\Measurements\Fatigue\FatigueTable;

class FatigueBoundary extends AbstractDerivedProperty
{
    const FATIGUE_BOUNDARY = PropertyCodes::FATIGUE_BOUNDARY;

    public function __construct(Endurance $endurance, FatigueTable $fatigueTable)
    {
        $fatigue = $fatigueTable->toFatigue(
            new FatigueBonus($endurance->getValue() + 10, $fatigueTable)
        );
        $this->value = $fatigue->getValue();
    }

    public function getCode()
    {
        return self::FATIGUE_BOUNDARY;
    }
}
