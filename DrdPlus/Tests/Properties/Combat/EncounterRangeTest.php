<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\EncounterRange;
use DrdPlus\Tables\Measurements\Distance\Distance;
use DrdPlus\Tables\Measurements\Distance\DistanceBonus;
use DrdPlus\Tables\Measurements\Distance\DistanceTable;
use DrdPlus\Tests\Properties\Combat\Partials\PositiveNumberCombatGameCharacteristicsTest;

class EncounterRangeTest extends PositiveNumberCombatGameCharacteristicsTest
{

    protected function createSut()
    {
        return new EncounterRange(123);
    }

    /**
     * @test
     */
    public function I_can_get_its_value_in_meters()
    {
        $encounterRange = new EncounterRange(123);
        $distanceTable = $this->mockery(DistanceTable::class);
        $distanceValue = 456;
        $distanceTable->shouldReceive('toDistance')
            ->with(\Mockery::type(DistanceBonus::class))
            ->andReturnUsing(function (DistanceBonus $distanceBonus) use ($distanceValue) {
                self::assertSame(123, $distanceBonus->getValue());
                $distance = $this->mockery(Distance::class);
                $distance->shouldReceive('getMeters')
                    ->andReturn($distanceValue);

                return $distance;
            });

        self::assertSame($distanceValue, $encounterRange->getInMeters($distanceTable));
    }

}