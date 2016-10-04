<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Properties\Derived\WoundBoundary;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;
use DrdPlus\Tables\Races\RacesTable;
use DrdPlus\Tests\Properties\Derived\Parts\AbstractDerivedPropertyTest;

class WoundBoundaryTest extends AbstractDerivedPropertyTest
{

    /**
     * @test
     * @return WoundBoundary
     */
    public function I_can_get_property_easily()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        $woundsLimit = new WoundBoundary(
            new Toughness(
                Strength::getIt($strength = 6),
                RaceCode::DWARF,
                SubRaceCode::MOUNTAIN,
                new RacesTable()
            ),
            new WoundsTable()
        );
        self::assertSame(
            22, // bonus of wound 17 (6 + 10 + 1) = wound of 22
            $woundsLimit->getValue()
        );

        return $woundsLimit;
    }
}
