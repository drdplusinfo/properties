<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Tables\Measurements\Distance\Distance;
use DrdPlus\Tables\Measurements\Distance\DistanceBonus;
use DrdPlus\Tables\Measurements\Distance\DistanceTable;
use DrdPlus\Tables\Tables;
use Granam\Tests\Tools\TestWithMockery;

class HeightTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_use_it()
    {
        $tables = $this->createTablesWithDistanceTable(
            function (Distance $distance) {
                self::assertSame(1.23, $distance->getValue());

                return $this->createDistanceBonus(456);
            }
        );
        $height = new Height($this->createHeightInCm(123), $tables);
        self::assertSame(456, $height->getValue());
        self::assertSame('456', (string)$height);
        self::assertSame(PropertyCode::getIt(PropertyCode::HEIGHT), $height->getCode());
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|HeightInCm
     */
    private function createHeightInCm($value)
    {
        $heightInCm = $this->mockery(HeightInCm::class);
        $heightInCm->shouldReceive('getValue')
            ->andReturn($value);

        return $heightInCm;
    }

    /**
     * @param \Closure $toBonus
     * @return \Mockery\MockInterface|Tables
     */
    private function createTablesWithDistanceTable(\Closure $toBonus)
    {
        $tables = $this->mockery(Tables::class);
        $tables->shouldReceive('getDistanceTable')
            ->andReturn($distanceTable = $this->mockery(DistanceTable::class));
        $distanceTable->shouldReceive('toBonus')
            ->andReturnUsing($toBonus);

        return $tables;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|DistanceBonus
     */
    private function createDistanceBonus($value)
    {
        $distanceBonus = $this->mockery(DistanceBonus::class);
        $distanceBonus->shouldReceive('getValue')
            ->andReturn($value);

        return $distanceBonus;
    }
}
