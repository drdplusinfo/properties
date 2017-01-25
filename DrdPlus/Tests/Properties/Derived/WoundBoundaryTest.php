<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Properties\Derived\WoundBoundary;
use DrdPlus\Tables\Measurements\Wounds\Wounds;
use DrdPlus\Tables\Measurements\Wounds\WoundsBonus;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;
use DrdPlus\Tables\Races\RacesTable;
use DrdPlus\Tables\Tables;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;

class WoundBoundaryTest extends AbstractDerivedPropertyTest
{

    /**
     * @test
     * @return WoundBoundary
     */
    public function I_can_use_it()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        $woundsLimit = WoundBoundary::getIt(
            Toughness::getIt(
                Strength::getIt(6),
                $raceCode = RaceCode::getIt(RaceCode::DWARF),
                $subRaceCode = SubRaceCode::getIt(SubRaceCode::MOUNTAIN),
                $this->createTablesWithRacesTable($raceCode, $subRaceCode, 456)
            ),
            $this->createTablesWithWoundsTable(6 + 456 + 10, 123)
        );
        self::assertSame(123, $woundsLimit->getValue());
        self::assertSame(PropertyCode::getIt(PropertyCode::WOUND_BOUNDARY), $woundsLimit->getCode());

        return $woundsLimit;
    }

    /**
     * @param RaceCode $raceCode
     * @param SubRaceCode $subRaceCode
     * @param $toughness
     * @return \Mockery\MockInterface|Tables
     */
    private function createTablesWithRacesTable(RaceCode $raceCode, SubRaceCode $subRaceCode, $toughness)
    {
        $tables = $this->mockery(Tables::class);
        $tables->shouldReceive('getRacesTable')
            ->andReturn($racesTable = $this->mockery(RacesTable::class));
        $racesTable->shouldReceive('getToughness')
            ->with($raceCode, $subRaceCode)
            ->andReturn($toughness);

        return $tables;
    }

    /**
     * @param $expectedWoundsBonusValue
     * @param $woundsValue
     * @return \Mockery\MockInterface|Tables
     */
    private function createTablesWithWoundsTable($expectedWoundsBonusValue, $woundsValue)
    {
        $tables = $this->mockery(Tables::class);
        $tables->shouldReceive('getWoundsTable')
            ->andReturn($woundsTable = $this->mockery(WoundsTable::class));
        $woundsTable->shouldReceive('toWounds')
            ->with($this->type(WoundsBonus::class))
            ->andReturnUsing(function (WoundsBonus $woundsBonus) use ($expectedWoundsBonusValue, $woundsValue) {
                self::assertSame($expectedWoundsBonusValue, $woundsBonus->getValue());

                $wounds = $this->mockery(Wounds::class);
                $wounds->shouldReceive('getValue')
                    ->andReturn($woundsValue);

                return $wounds;
            });

        return $tables;
    }
}