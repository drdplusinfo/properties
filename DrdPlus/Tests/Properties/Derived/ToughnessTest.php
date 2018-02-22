<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Tables\Races\RacesTable;
use DrdPlus\Tables\Tables;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;

class ToughnessTest extends AbstractDerivedPropertyTest
{
    /**
     * @test
     * @return Toughness
     */
    public function I_can_use_it()
    {
        $toughness = Toughness::getIt(
            $this->createStrength($strengthValue = 123),
            $raceCode = RaceCode::getIt(RaceCode::DWARF),
            $subRaceCode = SubRaceCode::getIt(SubRaceCode::WOOD),
            $this->createTablesWithRacesTable($raceCode, $subRaceCode, 456)
        );
        self::assertSame(579, $toughness->getValue());
        self::assertSame('579', (string)$toughness);
        self::assertSame(PropertyCode::getIt(PropertyCode::TOUGHNESS), $toughness->getCode());

        return $toughness;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Strength
     */
    private function createStrength($value)
    {
        return $this->createProperty(Strength::class, $value);
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
            ->zeroOrMoreTimes()
            ->with($raceCode, $subRaceCode)
            ->andReturn($toughness);

        return $tables;
    }
}