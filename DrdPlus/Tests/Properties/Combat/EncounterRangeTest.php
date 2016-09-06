<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\EncounterRange;
use DrdPlus\Tests\Properties\Combat\Partials\PositiveNumberCombatGameCharacteristicsTest;

class EncounterRangeTest extends PositiveNumberCombatGameCharacteristicsTest
{

    protected function createSut()
    {
        return new EncounterRange(123);
    }

}