<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Tables\Measurements\Distance\Distance;
use DrdPlus\Tables\Measurements\Distance\DistanceBonus;
use DrdPlus\Tables\Measurements\Distance\DistanceTable;
use Granam\Tests\Tools\TestWithMockery;

class HeightTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_use_it()
    {
        $distanceTable = $this->createDistanceTable();
        $distanceTable->shouldReceive('toBonus')
            ->andReturnUsing(function (Distance $distance) {
                self::assertSame(1.23, $distance->getValue());

                return $this->createDistanceBonus(456);
            });
        $height = new Height($this->createHeightInCm(123), $distanceTable);

        self::assertSame(456, $height->getValue());
        self::assertSame('456', (string)$height);
        self::assertSame('height', $height->getCode());
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
     * @return \Mockery\MockInterface|DistanceTable
     */
    private function createDistanceTable()
    {
        return $this->mockery(DistanceTable::class);
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
