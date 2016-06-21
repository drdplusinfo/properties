<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\RaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Properties\Derived\WoundBoundary;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;
use DrdPlus\Tables\Races\RacesTable;

/** @noinspection LongInheritanceChainInspection */
class WoundBoundaryTest extends AbstractTestOfDerivedProperty
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
                new Strength($strength = 6),
                RaceCode::DWARF,
                RaceCode::MOUNTAIN,
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
