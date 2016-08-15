<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Endurance;
use DrdPlus\Properties\Derived\FatigueBoundary;
use DrdPlus\Tables\Measurements\Fatigue\FatigueTable;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;
use DrdPlus\Tests\Properties\Derived\Parts\AbstractDerivedPropertyTest;

class FatigueBoundaryTest extends AbstractDerivedPropertyTest
{

    /**
     * @test
     * @return FatigueBoundary
     */
    public function I_can_get_property_easily()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        $fatigueLimit = new FatigueBoundary(
            new Endurance(new Strength($strength = 1), new Will($will = 2)),
            new FatigueTable(new WoundsTable())
        );
        self::assertSame(
            (int)round(($strength + $will) / 2) + 10, // simplified; bonus of wound 12 = wound of 12
            $fatigueLimit->getValue()
        );

        return $fatigueLimit;
    }
}
