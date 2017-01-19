<?php
namespace DrdPlus\Tests\Properties\Combat\Partials;

use DrdPlus\Properties\Combat\EncounterRange;
use DrdPlus\Properties\Combat\MaximalRange;
use DrdPlus\Properties\Combat\Partials\AbstractRange;
use DrdPlus\Tables\Measurements\Distance\Distance;
use DrdPlus\Tables\Measurements\Distance\DistanceBonus;
use DrdPlus\Tables\Measurements\Distance\DistanceTable;
use DrdPlus\Tables\Tables;

abstract class AbstractRangeTest extends PositiveNumberCombatGameCharacteristicsTest
{
    /**
     * @param int $value
     * @return AbstractRange|EncounterRange|MaximalRange
     */
    protected function createSut($value = 123)
    {
        return $this->createRangeSut($value);
    }

    /**
     * @param $value
     * @return AbstractRange|EncounterRange|MaximalRange
     */
    abstract protected function createRangeSut($value);

    /**
     * @return array|string[]
     */
    protected function getExpectedInitialChangeBy()
    {
        return [
            'name' => 'create range sut',
            'with' => '123',
        ];
    }

    /**
     * @test
     */
    public function I_can_get_its_value_in_meters()
    {
        /** @var EncounterRange $range */
        $range = $this->createSut(123);
        $distanceValue = 456;
        $tables = $this->createTablesWithDistanceTable(
            function (DistanceBonus $distanceBonus) use ($distanceValue) {
                self::assertSame(123, $distanceBonus->getValue());
                $distance = $this->mockery(Distance::class);
                $distance->shouldReceive('getMeters')
                    ->andReturn($distanceValue);

                return $distance;
            }
        );

        self::assertSame($distanceValue, $range->getInMeters($tables));
    }

    /**
     * @param \Closure $toDistance
     * @return \Mockery\MockInterface|Tables
     */
    private function createTablesWithDistanceTable(\Closure $toDistance)
    {
        $tables = $this->mockery(Tables::class);
        $tables->shouldReceive('getDistanceTable')
            ->andReturn($distanceTable = $this->mockery(DistanceTable::class));
        $distanceTable->shouldReceive('toDistance')
            ->with(\Mockery::type(DistanceBonus::class))
            ->andReturnUsing($toDistance);

        return $tables;
    }
}