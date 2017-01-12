<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Senses;
use DrdPlus\Tables\Races\RacesTable;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;

class SensesTest extends AbstractDerivedPropertyTest
{
    /**
     * #@test
     * @return Senses
     */
    public function I_can_get_property_easily()
    {
        $senses = new Senses(
            $this->createKnack($knackValue = 123),
            $raceCode = $this->createRaceCode('foo'),
            $subraceCode = $this->createSubRaceCode('bar'),
            $this->createRacesTable($raceCode, $subraceCode, $raceGenderSenses = 456)
        );
        self::assertSame($knackValue + $raceGenderSenses, $senses->getValue());
        self::assertSame((string)($knackValue + $raceGenderSenses), "$senses");

        return $senses;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Knack
     */
    private function createKnack($value)
    {
        return $this->createProperty(Knack::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|RaceCode
     */
    private function createRaceCode($value)
    {
        $raceCode = $this->mockery(RaceCode::class);
        $raceCode->shouldReceive('getValue')
            ->andReturn($value);

        return $raceCode;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|SubRaceCode
     */
    private function createSubRaceCode($value)
    {
        $subRaceCode = $this->mockery(SubRaceCode::class);
        $subRaceCode->shouldReceive('getValue')
            ->andReturn($value);

        return $subRaceCode;
    }

    /**
     * @param $expectedRacesCode
     * @param $expectedSubRaceCode
     * @param $senses
     * @return \Mockery\MockInterface|RacesTable
     */
    private function createRacesTable($expectedRacesCode, $expectedSubRaceCode, $senses)
    {
        $racesTable = $this->mockery(RacesTable::class);
        $racesTable->shouldReceive('getSenses')
            ->with($expectedRacesCode, $expectedSubRaceCode)
            ->andReturn($senses);

        return $racesTable;
    }
}