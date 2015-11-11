<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Properties\Derived\WoundsLimit;
use DrdPlus\Races\Dwarfs\MountainDwarf;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;
use DrdPlus\Tables\Races\RacesTable;

class WoundsLimitTest extends AbstractTestOfDerivedProperty
{

    /**
     * @test
     * @return WoundsLimit
     */
    public function I_can_get_property_easily()
    {
        $woundsLimit = new WoundsLimit(
            new Toughness(
                new Strength($strength = 6),
                MountainDwarf::getIt(),
                new RacesTable()
            ),
            new WoundsTable()
        );
        $this->assertSame(
            22, // bonus of wound 17 (6 + 10 + 1) = wound of 22
            $woundsLimit->getValue()
        );

        return $woundsLimit;
    }
}
