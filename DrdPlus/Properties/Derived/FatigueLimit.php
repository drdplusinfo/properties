<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Tables\Measurements\Fatigue\FatigueBonus;
use DrdPlus\Tables\Measurements\Fatigue\FatigueTable;

class FatigueLimit extends AbstractDerivedProperty
{
    const FATIGUE_LIMIT = 'fatigue_limit';

    public function __construct(FatigueTable $fatigueTable, Endurance $endurance)
    {
        $fatigue = $fatigueTable->toFatigue(
            new FatigueBonus($endurance->getValue() + 10, $fatigueTable)
        );
        $this->value = $fatigue->getValue();
    }

    public function getCode()
    {
        return self::FATIGUE_LIMIT;
    }
}
