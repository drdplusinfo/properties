<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Endurance;
use DrdPlus\Properties\Derived\FatigueLimit;
use DrdPlus\Tables\Measurements\Fatigue\FatigueTable;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;

class FatigueLimitTest extends AbstractTestOfDerivedProperty
{

    /**
     * @test
     * @return FatigueLimit
     */
    public function I_can_get_property_easily()
    {
        $fatigueLimit = new FatigueLimit(
            new Endurance(new Strength($strength = 1), new Will($will = 2)),
            new FatigueTable(new WoundsTable())
        );
        $this->assertSame(
            (int)round(($strength + $will) / 2) + 10, // simplified; bonus of wound 12 = wound of 12
            $fatigueLimit->getValue()
        );

        return $fatigueLimit;
    }
}
